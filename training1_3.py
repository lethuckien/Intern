import requests
import pandas as pd
from io import StringIO
import json
api_key = '2133f7a2ae79aa2e94c588e20f9d2aa1'
password = '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'
shop = 'TestStoreTrainingLit'
r = requests.get(f'https://{api_key}:{password}@{shop}.myshopify.com/admin/api/2021-04/customers.json')
customers = json.loads(r.text)

# print(customers)
df = pd.DataFrame()
for customer in customers['customers']:
    customer['addresses'] = ''
    customer['default_address'] = ''
    temp = pd.json_normalize(customer)
    df = df.append(temp)

df.to_csv('test.csv', index=False)
