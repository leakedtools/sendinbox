@REM @Author: Eka Syahwan
@REM @Date:   2017-09-14 06:18:06
@REM @Last Modified by:   Eka Syahwan
@REM Modified time: 2017-09-21 08:21:21
@echo off
set PATH=%PATH%;C:\xampp\php
title Sendinbox 1.0.7 (www.bmarket.or.id)
:runsendinbox
php sendinbox.php
pause
cls
goto runsendinbox