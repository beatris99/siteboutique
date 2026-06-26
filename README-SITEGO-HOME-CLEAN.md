# SiteGo home clean patch

Aplică fișierele peste proiectul Laravel/Vue existent.

Pași recomandați pe server/local:

```bash
# din rădăcina proiectului
unzip sitego-home-clean-patch.zip -d .
npm run build
php artisan optimize:clear
php artisan config:cache
```

Ce schimbă patch-ul:
- home simplificat: hero + mockup telefon + contact
- fără afișare publică de prețuri pe flow-ul principal
- mockup-uri în telefon pentru RentRide, site prezentare, CRM/admin și rezervări/catalog
- texte RO/EN venite din backend: `lang/ro/home_lite.php` și `lang/en/home_lite.php`
- contact form simplificat
- `/preturi` redirecționează spre `/contact`
