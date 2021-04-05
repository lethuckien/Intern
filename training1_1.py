
import requests
url = 'http://45.79.43.178/source_carts/wordpress/wp-admin'
login = {'log': 'admin', 'pwd':'123456aA'}
with requests.Session() as s:
    print(s.post('http://45.79.43.178/source_carts/wordpress/wp-login.php', data=login).status_code)
    
    