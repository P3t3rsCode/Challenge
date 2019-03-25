console.log('here')
initMap=(lat1=25.344,lng1=131.036)=>{
    var uluru = {lat: lat1, lng: lng1};
    var map = new google.maps.Map(
    document.getElementById('map'), {zoom: 4, center: uluru});
    var marker = new google.maps.Marker({position: uluru, map: map});
  }

plot=(item)=>{
    var element=document.getElementById('map');
    element.style.zIndex=1;
    element.style.display="block";
    console.log(item.id)
    var latId="lat"+item.id;
    var lngId="lng"+item.id;
    var lat= parseFloat (document.getElementById(latId).innerText);
    var lng= parseFloat(document.getElementById(lngId).innerText);
    console.log(lat.toFixed(3),lng.toFixed(3))
    initMap(lat.toFixed(3),lng.toFixed(3));
  }

  disable=()=>{
    var element=document.getElementById('map');
    element.style.zIndex=-11;
    element.style.display="none";
  }