ops = ['+','-','']

def sum_100(s, i):
    if i <= 9:
        for op in ops:
            sum_100(s + op + str(i), i+1)
    elif eval(s) == 100:
        print(s + ' = 100')

sum_100('1', 2)
