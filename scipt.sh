#!/bin/bash

while true; do
    clear
    echo "Меню:"
    echo "1. Информация о пользователе и ОС"
    echo "2. Список файлов домашней директории с правами доступа"
    echo "3. Создать файл с заданными правами"
    echo "4. Отправить 3 ping-пакета"
    echo "5. Выход"
    read -p "Выберите пункт меню (1-5): " choice

    case $choice in
        1)
            echo -e "\nИнформация о текущем пользователе:"
            whoami
            echo -e "\nИнформация о версии ОС:"
            lsb_release -a 2>/dev/null || cat /etc/*release 2>/dev/null || echo "Информация о версии ОС недоступна"
            read -p "Нажмите Enter для продолжения..."
            ;;
        2)
            echo -e "\nСписок файлов в домашней директории ($HOME) с правами доступа:"
            ls -la ~ | awk '{k=0;for(i=0;i<=8;i++)k+=((substr($1,i+2,1)~/[rwx]/)*2^(8-i));if(k)printf("%0o ",k);print}'
            read -p "Нажмите Enter для продолжения..."
            ;;
        3)
            read -p "Введите путь к директории, где создать файл: " dirpath
            read -p "Введите имя файла: " filename
            read -p "Введите права доступа (например, 755): " permissions
            
            if [ -d "$dirpath" ]; then
                touch "$dirpath/$filename"
                chmod "$permissions" "$dirpath/$filename"
                echo "Файл $dirpath/$filename создан с правами $permissions"
            else
                echo "Ошибка: директория $dirpath не существует!"
            fi
            read -p "Нажмите Enter для продолжения..."
            ;;
        4)
            read -p "Введите адрес для ping (например, google.com): " host
            echo -e "\nРезультат ping:"
            ping -c 3 "$host" || echo "Ошибка при выполнении ping"
            read -p "Нажмите Enter для продолжения..."
            ;;
        5)
            echo "Выход..."
            exit 0
            ;;
        *)
            echo "Неверный выбор. Попробуйте снова."
            read -p "Нажмите Enter для продолжения..."
            ;;
    esac
done