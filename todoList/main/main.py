# 1. функция для записи дела в список дел
def add():
    delo = input('Введите новое дело в список: ')
    to_do_plan.append(delo)

# 2. функция для вывода списка дел на экран
def display():
    if len(to_do_plan) > 0:
        print(to_do_plan)
    else:
        print("На сегодня дел нет")

# 3. функция удаления дела из списка
def del_delo():
    delo_del = input('Какое дело нужно удалить? ')
    if delo_del in to_do_plan:
        to_do_plan.remove(delo_del)
    else:
        print("такого дела нет в списке")

# 4. функция для пометки дела в списке как выполненного
def delo_done():
    done = int(input('Введите номер выполненного дела: '))
    if done > 0 and done < len(to_do_plan):
        to_do_plan[done - 1] += ' - V'
    else:
        print("такого дела нет в списке")


# список дел
to_do_plan = []
print("Привет, вас приветствует планировщик дел на день")

# вывод на экран
while True:
    print("\nЧто вы хотите сделать? Выберите нужное(от 1 до 4)")
    print('-' * 40)
    print("1. Записать дело в список дел.")
    print("2. Вывести список дел на экран.")
    print("3. Удалить дело из списка.")
    print("4. Пометить дела в списке как выполненные.")
    print('-' * 40)

# ввод неверного номера команды
    menu = int(input('Введите номер команды: '))
    while menu > 4 or menu < 1:
        print('Неверный номер команды!')
        menu = int(input('Повторите ввод: '))

# логика списка дел
    if menu == 1:
        add()
    elif menu == 2:
        display()
    elif menu == 3:
        del_delo()
    elif menu == 4:
        delo_done()