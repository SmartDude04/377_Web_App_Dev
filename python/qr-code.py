import qrcode

img = qrcode.make('https://www.map.umcnetwork.net')

img.save("map.png")