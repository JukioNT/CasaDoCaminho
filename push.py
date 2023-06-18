from os import system

message = input('message: ')

system('git config user.name "JukioNT"')
system('git config user.email "jjulio2468@gmail.com"')
system('git add .')
system('git commit -m "' + message + '"')
system('git push origin master')