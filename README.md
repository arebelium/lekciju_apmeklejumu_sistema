## Kā sagatavot datubāzi

1. Izveidot datubāzi "lekciju_uzskaite" (caur phpMyAdmin utt.)  <br />
2. Atvērt .env failu un nomainīt DB_USERNAME un DB_PASSWORD uz savējo  <br />

## Kā palaist serveri

1. Aiziet uz servera mapi caur cmd(šī mape kur readme atrodas)  <br />
2. Izpildīt šīs komandas:  <br />
    composer install # ieinstalēs frameworka failus  <br />
    php artisan migrate # izveidos tabulas  <br />
    npm install --ignore-scripts # ieinstalēs visus dependencies  <br />
    php artisan serve # palaidīs serveri  <br />

## Assetu kompilēšana

npm run watch # servera mapē, atsevišķā konsolē(cmd) palaižam šo - lai redzētu izmaiņas, ko veicam assetu failos(js, scss, img)

## Git

Kad esam veikuši kādas izmaiņas un gribam aizsūtīt uz github, tad:    <br />
1. Pievienojam labotos failus ar git add *fails*   <br />
2. Uztaisam commitu ar git commit -am "izmainu nosaukums"   <br />
3. Iepušojam masterā ar git push origin   <br />