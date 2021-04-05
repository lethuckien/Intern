from sqlalchemy import create_engine
from numpy import insert
import pandas as pd
import pymysql

engine = create_engine('mysql+pymysql://{user}:{pw}@localhost/{db}'
                       .format(user='root',
                               pw='password',
                               db='test'))
conn = pymysql.connect(host='localhost',user='root', password='password', database='test')
cursor = conn.cursor()

df = pd.read_csv('customer.csv')
columns = df.columns.tolist()

create = 'CREATE TABLE IF NOT EXISTS customer (id int(15))'
cursor.execute(create)
df.to_sql('customer',con=engine, if_exists='replace',index=False)
conn.commit()
cursor.close()
conn.close()



