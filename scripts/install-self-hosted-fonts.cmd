@echo off
setlocal
powershell.exe -NoProfile -ExecutionPolicy Bypass -File "%~dp0install-self-hosted-fonts.ps1"
exit /b %errorlevel%
