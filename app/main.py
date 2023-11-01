import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np
import mlxtend
import networkx
import PyARMViz
import plotly

# pip install PyARMViz
#     !pip install networkx
# !pip install plotly


# items = pd.read_csv('data/phppos_items.csv', sep=';')
# sales_items = pd.read_csv('data/phppos_sales_items.csv',sep=';')

# items.head()
# sales_items.head()

# #join table
# df = pd.merge(items, sales_items, on='item_id', how='inner')
# df

# # Assuming 'df' is your DataFrame

# # Group by 'sale_id' and aggregate the rest of the columns
# transactions = df.groupby(['sale_id', 'name']).size().unstack(fill_value=0)

# # Reset the index to make 'sale_id' and 'name' as regular columns
# transactions = transactions.reset_index()

# # Fill NaN values with 0
# transactions = transactions.fillna(0)

# # Convert non-zero values to 1
# transactions[transactions > 0] = 1

# transactions = transactions.drop(columns=['sale_id'])

# transactions

# # !pip install mlxtend
# from mlxtend.frequent_patterns import association_rules, apriori
# f_items = apriori(transactions, min_support = 0.003, use_colnames = True)
# f_items

# apriori_rules = association_rules(f_items, metric = "lift", min_threshold = 0.001)
# apriori_rules.sort_values('confidence', ascending = False, inplace = True)
# apriori_rules

# # !pip install PyARMViz
# from PyARMViz.Rule import generate_rule_from_dict
# import numpy as np
# apriori_vis = apriori_rules

# apriori_vis['uni'] = np.nan
# apriori_vis['ant'] = np.nan
# apriori_vis['con'] = np.nan
# apriori_vis['tot'] = 51086 #sesuai baris dataset hasil pengolahan

# def tran():
#     for t in transactions:
#         yield t
# def antec(x):
#     cnt = 0
#     for t in tran():
#         t = set(t)
#         if x.intersection(t) == x:
#             cnt = cnt + 1
#     return cnt
# vis = apriori_vis.values.tolist()

# rules_dict = []
# for i in vis:
#     i[10] = antec(i[0])
#     i[11] = antec(i[1])
#     i[9] = antec(i[0].union(i[1]))
#     diction = {
#         'lhs': tuple(i[0]),
#         'rhs': tuple(i[1]),
#         'count_full': i[9],
#         'count_lhs': i[10],
#         'count_rhs': i[11],
#         'num_transactions': i[12]
#     }
#     rules_dict.append(diction)
    
#     rules_dict
    
# rules = []
# for rd in rules_dict:
#     rules.append(generate_rule_from_dict(rd))
    
# rules


