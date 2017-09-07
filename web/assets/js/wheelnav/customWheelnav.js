window.onload = function() {
//Insert generated JavaScript code from here -> http://pmg.softwaretailoring.net
    var piemenu = new wheelnav('piemenu');
    piemenu.spreaderInTitle = icon.plus;
    piemenu.spreaderOutTitle = icon.cross;
    piemenu.spreaderRadius = piemenu.wheelRadius * 0.13;
    piemenu.clockwise = false;
    piemenu.sliceInitPathFunction = piemenu.slicePathFunction;
    piemenu.initPercent = 0.1;
    piemenu.wheelRadius = piemenu.wheelRadius * 0.83;
    piemenu.navItemsContinuous = true;
    piemenu.sliceAngle = 45;
    piemenu.createWheel();
};