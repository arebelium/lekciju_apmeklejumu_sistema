## Kā sagatavot datubāzi

1. Izveidot datubāzi "lekciju_uzskaite" (caur phpMyAdmin utt.)  <br />
2. Atvērt .env failu un nomainīt DB_USERNAME un DB_PASSWORD uz savējo  <br />
3. php artisan migrate # Palaist servera mapē šo komandu, izveidos tabulas  <br />

## Kā palaist serveri

composer install # ieinstalēs frameworka failus  <br />
npm install --ignore-scripts # ieinstalēs visus dependencies  <br />
php artisan serve # palaidīs serveri  <br />

## Assetu kompilēšana
npm run watch # atsevišķā konsolē palaižam šo - lai redzētu izmaiņas, ko veicam assetu failos(js, scss, img)
