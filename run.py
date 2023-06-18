from subprocess import Popen
from os import system
import shutil
import platform
from time import sleep

system('npm install')
system('composer install')

#create .env
open('.env', 'w')
shutil.copyfile('.env.example', '.env')

with open('.env', 'r') as file:
    data = file.readlines()

data[13] = "DB_DATABASE=" + "laravel" + "\n"
data[14] = "DB_USERNAME=" + "root" + "\n"
data[15] = "DB_PASSWORD=" + "" +"\n"

with open('.env', 'w') as file:
    file.writelines(data)

system('php artisan migrate:refresh')

system('php artisan key:generate')

sistema = platform.system()
if sistema=="linux":
    p1 = Popen(['gnome-terminal', '--', 'bash', '-c', 'npm run dev'])
    sleep(5)
    p2 = Popen(['gnome-terminal', '--', 'bash', '-c', 'php artisan serve'])
    sleep(5)
    p3 = Popen(['gnome-terminal', '--', 'bash', '-c', 'xdg-open http://127.0.0.1:8000'])
else:
    p1 = Popen('start cmd /k npm run dev', shell=True)
    sleep(5)
    p2 = Popen('start cmd /k php artisan serve', shell=True)
    sleep(5)
    p3 = Popen('start http://127.0.0.1:8000', shell=True)

system("php artisan createadm")