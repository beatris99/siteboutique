# SiteGo patch

Copiere peste proiect:

```powershell
cd "C:\Users\BEA\Desktop\siteboutique"
Expand-Archive -Force "C:\path\to\sitego_lang_refactor_patch.zip" -DestinationPath .
```

Apoi adaugă în `.env` și `.env.example`:

```env
SITEGO_CONTACT_EMAIL=contact@sitego.ro
SITEGO_CONTACT_PHONE="+40 747 084 861"
SITEGO_CONTACT_LOCATION="Brașov, România"
SITEGO_CONTACT_AREA="Brașov și online"
```

Rulează:

```powershell
docker compose exec app php artisan optimize:clear
docker compose exec app php artisan view:clear
docker compose exec app php artisan route:clear
docker compose run --rm node npm run build
```
