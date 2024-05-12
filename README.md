net user Aminshahdi @Gddrgddgg0070 /add

net localgroup Administrators Aminshahdi/add

reg add

"HKEY_LOCAL_MACHINE\Software\Microsoft\Windows NT\CurrentVersion\Winlogon\SpecialAccounts\Userlist"

/v Aminshahdi/t REG

DWORD /d

0/f




https://dl.google.com/linux/direct/chrome-remote-desktop_current_amd64.deb



DISPLAY= /opt/google/chrome-remote-desktop/start-host --code="4/0AdLIrYc5M1Hpz_gMNBfLuR1Sm54pn5qi8Lee9aDajn-SFIXbFUTftXdYwLTqqiWdDarf1w" --redirect-url="https://remotedesktop.google.com/_/oauthredirect" --name=$(hostname)


Chrome Remote Desktop:

https://dl.google.com/linux/direct/chrome-remote-desktop_current_amd64.deb

Google Chrome:

https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb

XFCE Desktop Environment:

sudo DEBIAN_FRONTEND=noninteractive \
    apt install --assume-yes xfce4 desktop-base dbus-x11 xscreensaver

sudo bash -c 'echo "exec /etc/X11/Xsession /usr/bin/xfce4-session" > /etc/chrome-remote-desktop-session'
    
    
sudo systemctl disable lightdm.service


DISPLAY= /opt/google/chrome-remote-desktop/start-host --code="4/0AdLIrYcuQrQEdwgMIyazyMlZMxY7XJhgL31zPlzpUs4JRyX92O_rCD2XtcSGEwaCnF8bIg" --redirect-url="https://remotedesktop.google.com/_/oauthredirect" --name=$(hostname)



DISPLAY= /opt/google/chrome-remote-desktop/start-host --code="4/0AdLIrYdqicNI4_CGkJ1RcuzaIf45JBRvgMhTXTx_IQSy4uTkmBihmFM58Aeu-MBXiosZQQ" --redirect-url="https://remotedesktop.google.com/_/oauthredirect" --name=$(hostname)
