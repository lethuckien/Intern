def convert(x,y):
    if x == y:
        return 0
    if x > y:
        return x - y
    if x <= 0 and y > 0:
        return -1
    if y % 2 == 1:
        return 1 + convert(x, y+1)
    else: 
        return 1 + convert(x, y/2)

print('Minimum operations taken: ' + str(int(convert(3, 14))))
