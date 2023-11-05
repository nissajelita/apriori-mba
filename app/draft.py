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
    df_items = pd.DataFrame(data['item']) if 'item' in data else pd.DataFrame()
    df_sales_items = pd.DataFrame(data['penjualan']) if 'penjualan' in data else pd.DataFrame()
    
    # cari panjang dataframe
    x = pd.DataFrame(df_sales_items)
    a = x['sale_id'].tolist()
    a = x['sale_id'].nunique()

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
    frequent_itemsets = apriori(transactions, min_support=0.04, use_colnames=True)
    apriori_rules = association_rules(frequent_itemsets, metric="lift", min_threshold=0.04)
    apriori_rules.sort_values('confidence', ascending=False, inplace=True)


    # Membuat salinan aturan asosiasi untuk visualisasi
    apriori_vis = apriori_rules.copy()

    # Menghitung jumlah transaksi yang memenuhi aturan asosiasi
    def count_transactions(antecedent, consequent):
        count_full = len(df[df['name'].isin(antecedent) & df['name'].isin(consequent)])
        count_lhs = len(df[df['name'].isin(antecedent)])
        count_rhs = len(df[df['name'].isin(consequent)])
        return count_full, count_lhs, count_rhs

    # Menambahkan kolom-kolom baru ke dalam DataFrame aturan asosiasi
    apriori_vis['count_full'], apriori_vis['count_lhs'], apriori_vis['count_rhs'] = zip(*apriori_vis.apply(lambda row: count_transactions(row['antecedents'], row['consequents']), axis=1))

    # Membuat list aturan asosiasi yang siap untuk divisualisasikan
    rules_list = []

    for index, row in apriori_vis.iterrows():
        rule = {
            'lhs': tuple(row['antecedents']),
            'rhs': tuple(row['consequents']),
            'count_full': row['count_full'],
            'count_lhs': row['count_lhs'],
            'count_rhs': row['count_rhs'],
            'num_transactions': row['support']  # Atau gunakan kolom lain yang sesuai untuk jumlah transaksi
        }
        rules_list.append(rule)
        
        
    #simpan gambar
    folder_path = '../siweb/public/img'
    # Set up the data for visualization
    confidences = apriori_vis['confidence']  # Mengambil nilai confidence dari DataFrame aturan asosiasi
    supports = apriori_vis['support']  # Mengambil nilai support dari DataFrame aturan asosiasi

    # Plotting the data
    plt.figure(figsize=(10, 6))

    # Scatter plot
    plt.scatter(supports, confidences, alpha=0.5)
    plt.xlabel('Support')
    plt.ylabel('Confidence')
    plt.title('Association Rules - Support vs Confidence')

    # Menambahkan label pada setiap titik data
    for i, txt in enumerate(apriori_vis.index):
        plt.annotate(txt, (supports[i], confidences[i]))

    file_path = os.path.join(folder_path, 'grafik.png')
    plt.savefig(file_path, bbox_inches='tight')
    # plt.show()
    

    
    return jsonify(rules_list)


app.run(host="0.0.0.0")


    


