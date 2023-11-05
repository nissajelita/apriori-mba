from flask import Flask, render_template, Response, request, redirect, jsonify
from mlxtend.frequent_patterns import association_rules, apriori
from PyARMViz.Rule import generate_rule_from_dict
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np
import mlxtend
import networkx
import PyARMViz
import plotly
import os

app = Flask(__name__)

@app.route('/receive_data', methods=['POST'])
def receive_data():
    data = request.get_json()
    
    
    # Konversi data JSON items dan sales_items ke dalam DataFrame Pandas
    df_items       = pd.DataFrame(data['item']) if 'item' in data else pd.DataFrame()
    df_sales_items = pd.DataFrame(data['penjualan']) if 'penjualan' in data else pd.DataFrame()
    spt            = float(data['min_support']) if 'min_support' in data else 0.0
    # Lakukan penggabungan (merge) berdasarkan kolom 'item_id'
    df = pd.merge(df_items, df_sales_items, on='item_id', how='inner')
    transactions = df.groupby(['sale_id', 'name']).size().unstack(fill_value=0)
    # Reset the index to make 'sale_id' and 'name' as regular columns
    transactions = transactions.reset_index()
    # Fill NaN values with 0
    transactions = transactions.fillna(0)
    transactions = transactions.apply(pd.to_numeric, errors='coerce')
    # Convert non-zero values to 1
    transactions[transactions > 0] = 1
    transactions = transactions.drop(columns=['sale_id'])


    # Melakukan analisis aturan asosiasi menggunakan algoritma Apriori
    frequent_itemsets = apriori(transactions, min_support=spt, use_colnames=True)
    apriori_rules = association_rules(frequent_itemsets, metric="lift", min_threshold=1)
    apriori_rules = apriori_rules.sort_values(['confidence', 'lift'], ascending=[False, False])
    
    if len(apriori_rules) > 20:
        apriori_rules = apriori_rules.nlargest(20, 'confidence')
    #simpan gambar
    folder_path = '../siweb/public/img'
    top_10_confidence = apriori_rules.nlargest(10, 'confidence')

    # START: SIMPAN TOP 10 RULES
    plt.figure(figsize=(10, 6))
    a = len(apriori_rules)
    
    b = 10 if a >=10 else a
    
    plt.barh(range(b), top_10_confidence['confidence'], color='skyblue')
    plt.yticks(range(b), [f"Items: {set(row['antecedents'])} ==> {set(row['consequents'])}" for _, row in top_10_confidence.iterrows()])
    plt.xlabel('Confidence')
    plt.title('Top 10 Association Rules by Confidence')
    plt.gca().invert_yaxis()
    file_path = os.path.join(folder_path, 'grafik.png')
    plt.savefig(file_path, bbox_inches='tight')
    # plt.show()
    # END: SIMPAN TOP 10 RULES
    
    # Convert frozensets to lists in the DataFrame to make it JSON serializable
    apriori_rules['antecedents'] = apriori_rules['antecedents'].apply(list)
    apriori_rules['consequents'] = apriori_rules['consequents'].apply(list)

    # Convert association rules to a list of dictionaries
    rules_list = apriori_rules.to_dict(orient='records')

    # Return the Apriori rules as a JSON response
    return jsonify(rules_list)


app.run(host="0.0.0.0")


    


