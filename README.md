# EFF Fantasy "Diceware" Password Generator 

A library creating random word passwords based on the EFF's FANDOM words lists.

https://www.eff.org/deeplinks/2018/08/dragon-con-diceware

## CLI Support

### PHP Installed Locally

With PHP ^7.4 installed locally, you can simply call the `run.php` file from the 
root directory: 

`$ php run.php`

You can also select the password dictionaries by the following strings:  

`startrek`: Star Trek words
`starwars`: Star Wars words
`harrypotter`: Harry Potter words
`got`: Game of Thrones words

Add the string to the command:  

`$ php run.php startrek` //This is the default string if you don't include one.

### Docker Support

#### Build Image

`$ docker build -f Dockerfile -t bobbyahines/effpwgenerator .`

#### Use Image

`$ docker run -it --rm bobbyahines/effpwgenerator`

or with the string for specific dictionary option:

`$ docker run -it --rm bobbyahines/effpwgenerator php run.php startrek`

#### Create a Bash Alias (linux)

In /home/$USER/.bash_aliases file, add something like:

`alias newPassword='docker run -it --rm bobbyahines/effpwgenerator php run.php $1`

...then `source ~/.bashrc` to enable.

