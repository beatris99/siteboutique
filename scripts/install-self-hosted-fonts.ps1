$ErrorActionPreference = "Stop"

$root = Split-Path -Parent $PSScriptRoot
$fontDir = Join-Path $root "public\fonts"
New-Item -ItemType Directory -Force -Path $fontDir | Out-Null

$files = [ordered]@{
    "instrument-sans-latin-wght-normal.woff2" = "https://cdn.jsdelivr.net/fontsource/fonts/instrument-sans:vf@5.3.0/latin-wght-normal.woff2"
    "instrument-sans-latin-ext-wght-normal.woff2" = "https://cdn.jsdelivr.net/fontsource/fonts/instrument-sans:vf@5.3.0/latin-ext-wght-normal.woff2"
    "source-serif-4-latin-wght-normal.woff2" = "https://cdn.jsdelivr.net/fontsource/fonts/source-serif-4:vf@5.3.0/latin-wght-normal.woff2"
    "source-serif-4-latin-ext-wght-normal.woff2" = "https://cdn.jsdelivr.net/fontsource/fonts/source-serif-4:vf@5.3.0/latin-ext-wght-normal.woff2"
    "LICENSE-INSTRUMENT-SANS.txt" = "https://raw.githubusercontent.com/google/fonts/main/ofl/instrumentsans/OFL.txt"
    "LICENSE-SOURCE-SERIF-4.txt" = "https://raw.githubusercontent.com/google/fonts/main/ofl/sourceserif4/OFL.txt"
}

foreach ($item in $files.GetEnumerator()) {
    $target = Join-Path $fontDir $item.Key
    Write-Host "Downloading $($item.Key)..."
    Invoke-WebRequest -Uri $item.Value -OutFile $target -UseBasicParsing

    if ((Get-Item $target).Length -lt 500) {
        throw "Downloaded file looks invalid: $target"
    }
}

Write-Host ""
Write-Host "Self-hosted fonts installed in $fontDir" -ForegroundColor Green
Get-ChildItem $fontDir -File | Select-Object Name, Length
