import bs4
import requests
from selenium import webdriver

### request
url = 'http://45.79.43.178/source_carts/wordpress/wp-admin'
login = {'log': 'admin', 'pwd':'123456aA'}
with requests.Session() as s:
    soup = bs4.BeautifulSoup(s.post('http://45.79.43.178/source_carts/wordpress/wp-login.php', data=login).text, 'lxml') 
    print(soup.find('span','display-name').string)



### selenium
driver = webdriver.Chrome(r'C:\Users\ADMIN\Downloads\chromedriver.exe')
driver.get(url)

username = driver.find_element_by_id('user_login')
username.clear()
username.send_keys('admin')

password = driver.find_element_by_id('user_pass')
password.clear()
password.send_keys("123456aA")

driver.find_element_by_id('wp-submit').click()

name = driver.find_element_by_class_name('display-name').text
print(name)




    

    