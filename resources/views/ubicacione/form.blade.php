<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Descripcion_ubi') }}
            {{ Form::text('Descripcion_ubi', $ubicacione->Descripcion_ubi, ['class' => 'form-control' . ($errors->has('Descripcion_ubi') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Ubi']) }}
            {!! $errors->first('Descripcion_ubi', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('latitud_ubi') }}
            {{ Form::text('latitud_ubi', $ubicacione->latitud_ubi, ['id' => 'latitud_ubi', 'class' => 'form-control' . ($errors->has('latitud_ubi') ? ' is-invalid' : ''), 'placeholder' => 'Latitud Ubi']) }}
            {!! $errors->first('latitud_ubi', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('longitud_ubi') }}
            {{ Form::text('longitud_ubi', $ubicacione->longitud_ubi, ['id' => 'longitud_ubi', 'class' => 'form-control' . ($errors->has('longitud_ubi') ? ' is-invalid' : ''), 'placeholder' => 'Longitud Ubi']) }}
            {!! $errors->first('longitud_ubi', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div id="map" style="height: 300px; border-radius: 8px;"></div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script>
    // Inicializa el mapa
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 0, lng: 0 }, // Latitud y longitud inicial (centro del mapa)
            zoom: 18 // Nivel de zoom inicial
        });

        // Llama a la API de geolocalización de Google Maps
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitud = position.coords.latitude;
                var longitud = position.coords.longitude;

                // Actualiza los campos de latitud y longitud
                document.getElementById('latitud_ubi').value = latitud;
                document.getElementById('longitud_ubi').value = longitud;

                // Posiciona el marcador en el mapa
                var marker = new google.maps.Marker({
                    position: { lat: latitud, lng: longitud },
                    map: map,
                    draggable: true
                });

                // Centra el mapa en la posición obtenida
                map.setCenter({ lat: latitud, lng: longitud });
            }, function () {
                // Manejo de errores en caso de que la geolocalización no esté disponible
                console.error('La geolocalización no está disponible.');
            });
        } else {
            console.error('El navegador no soporta la geolocalización.');
        }

          // Añade un listener para el evento de cambio de posición del mapa
            map.addListener('center_changed', function () {
                var center = map.getCenter();
                var latitud = center.lat().toFixed(6);  // Ajusta la precisión de la latitud a 6 decimales
                var longitud = center.lng().toFixed(6); // Ajusta la precisión de la longitud a 6 decimales

                // Actualiza los campos de latitud y longitud
                document.getElementById('latitud_ubi').value = latitud;
                document.getElementById('longitud_ubi').value = longitud;
            });
    }
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>