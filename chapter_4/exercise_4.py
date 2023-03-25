print();

a = [3,1,4,5,2];

# Question original
def greatestNumber(array):
    steps = 0
    for i in array:
        # Assume for now that i is greatest:
        isIValTheGreatest = True

        for j in array:
            steps += 1
            # If we find another value that is greater than i,
            # i is not the greatest:
            if j > i:
                isIValTheGreatest = False

        # If, by the time we checked all the other numbers, i
        # is still the greatest it means that i is the greatest number:
        if isIValTheGreatest:
            print(steps)
            return i

print(greatestNumber(a))

# Question improved/answer
def greatestNumberImproved(array):
    steps = 0
    greatestVal = float('-inf')

    for i in array:
        steps += 1
        if i > greatestVal:
            greatestVal = i

    print(steps)

    return greatestVal

print(greatestNumberImproved(a))

