<?php
/**
 * Created by Lemmy.
 * Date: 8/17/12
 * Time: 7:50 PM
 */

    $clat = 0;
    $cLong = 0;

    Yii::import('ext.gmaps.*');

    $sw = new EGMapCoord($coordsForZoom['sW']['lat'], $coordsForZoom['sW']['long']);
    $ne = new EGMapCoord($coordsForZoom['nE']['lat'], $coordsForZoom['nE']['long']);

    $bound = new EGMapBounds($sw, $ne);
    $zoomAuto = $bound->getZoom(min($size['width'], $size['height']), $zoom);
    //MyFunctions::echoArray($zoomAuto);

    //these are same lat and long like centerLat and $centerLong

    $centerLat = $bound->getCenterLat();
    $centerLong = $bound->getCenterLng();

    //MyFunctions::echoArray(array($centLat, $centLong), array($centerLat, $centerLong));

    $gMap = new EGMap();
    $gMap->width = $size['width'];
    $gMap->height = $size['height'];

    $mapTypeControlOptions = array(
        'position'=> EGMapControlPosition::RIGHT_TOP,
        'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
    );

    $gMap->mapTypeControlOptions = $mapTypeControlOptions;

    if(isset($center)){
        $cLat = floatval($center['latitude']);
        $cLong = floatval($center['longitude']);
    }
    else{
       $cLat = $centerLat;
       $cLong = $centerLong;
    }

    $gMap->setCenter( $cLat, $cLong );
    $gMap->zoom =$zoomAuto;
    $gMap->scaleControl = true;
    $gMap->scrollwheel = false;
    //MyFunctions::echoArray( $center, $markers, $zoom );

    foreach( $markers as $item )
    {
        //if( isset($item['title'])){
            $chld = @$item['title'];
            // Create GMapInfoWindows
            $icon = new EGMapMarkerImage("http://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=$chld|F08080|000000");
        //} else {
        //    $icon = new EGMapMarkerImage("http://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=|F08080|000000");
        //}

        $info_window = new EGMapInfoWindow($item['cloud']);
        $marker = new EGMapMarkerWithLabel($item['latitude'], $item['longitude'], array(
            'title' => $item['tooltip'],
            'icon' => $icon,
        ));
        $marker->addHtmlInfoWindow($info_window);

        $gMap->addMarker($marker);
    }
    // enabling marker clusterer just for fun
    // to view it zoom-out the map
    if( $useMarkerClusterer ) $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
    //
    $gMap->renderMap();
?>