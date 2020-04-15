require('./bootstrap');
import tt from '@tomtom-international/web-sdk-maps';


var map = tt.map({
    key: 'gFFCW4AFnFwAIM5ZWPG6Sew8JPYhCY0i',
    container: 'map',
    style: 'tomtom://vector/1/basic-main',
    // dragPan: !isMobileOrTablet()
});
map.addControl(new tt.FullscreenControl());
map.addControl(new tt.NavigationControl());