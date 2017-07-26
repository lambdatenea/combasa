$( "#btn_add_cliente" ).click(function() {
  var cliente_nombre = $( "#cliente_nombre" ).val();
  var cliente_apellido = $( "#cliente_apellido" ).val();
  var cliente_telefono = $( "#cliente_telefono" ).val();
  var cliente_email = $( "#cliente_email" ).val();
  var cliente_password = $( "#cliente_password" ).val();


  if( cliente_nombre == null || cliente_nombre.length == 0 || /^\s+$/.test(cliente_nombre) ){
    alert('Por favor rellene el nombre.');
  }else if( cliente_apellido == null || cliente_apellido.length == 0 || /^\s+$/.test(cliente_apellido) ){
    alert('Por favor rellene el apellido.');
  }else if( isNaN(cliente_telefono) || cliente_telefono == null || cliente_telefono.length == 0 ){
    alert('Por favor rellene el telefono.');
  }else if( validateEmail(cliente_email) ){
    alert('Por favor rellene el email.');
  }else if( cliente_password == null || cliente_password.length == 0 || /^\s+$/.test(cliente_password) ){
    alert('Por favor rellene la contraseña.');
  }else{
    $.ajax({
      type: "POST",
      url: "../../Controller/clientes/add_new_cliente.php",
      dataType: "html",
      data: { 
        cliente_nombre : cliente_nombre,
        cliente_apellido : cliente_apellido,
        cliente_telefono : cliente_telefono,
        cliente_email : cliente_email,
        cliente_password : cliente_password
       },
      success:  function (response) {
        var msg = "Usuario creado correctamente.";
        window.location.href = "../Gracias.php";
      }
    });

  };
});

function validar_busqueda(){
  var busq = $( "#texto_buscar" ).val();
  if (busq == null || busq.length == 0 || /^\s+$/.test(busq)) {
    alert('Por favor introduce un termino a buscar.');
    return false;
  }else{
    return true;
  };
};

function validar_comentario(){
  var det_comentario = $( "#det_comentario" ).val();
  var det_nombre = $( "#det_nombre" ).val();
  var det_email = $( "#det_email" ).val();

  if (det_comentario == null || det_comentario.length == 0 || /^\s+$/.test(det_comentario)) {
    alert('Por favor introduce un comentario.');
    return false;
  }else if(det_nombre == null || det_nombre.length == 0 || /^\s+$/.test(det_nombre)){
    alert('Por favor introduce un nombre.');
    return false;
  }else if(det_email == null || det_email.length == 0 || /^\s+$/.test(det_email)){
    alert('Por favor introduce un email valido.');
    return false;
  }else{
    return true;
  };
};

function validateEmail(email) {
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
      return true;
    }else{
      return false;
    }
}

function btn_editar_cliente(c_id,c_nombre,c_apellido,c_tel,c_dir,c_pwd){
  //alert(c_id+" "+c_nombre+" "+c_apellido+" "+c_tel+" "+c_dir+" "+c_pwd);
  window.location.href = "edit_cliente.php?id="+c_id+"&nombre="+c_nombre+"&apellido="+c_apellido+"&telefono="+c_tel+"&direccion="+c_dir+"&pwd="+c_pwd;
};

function btn_borrar_cliente(c_id){
  $.ajax({
    type: "POST",
    url: "../../Controller/clientes/borrar_cliente.php",
    dataType: "html",
    data: { cliente_id : c_id },
    success:  function (response) {
      window.location.reload();
    },
    error: function (response){
      window.location.reload();
    }
  });

};

function btn_add_carrito(coche_id, coche_precio, coche_marca, coche_modelo, coche_foto_miniatura){
  $.ajax({
    type: "POST",
    url: "../../Controller/coches/add_coche_carrito.php",
    dataType: "html",
    data: {
            coche_id : coche_id,
            coche_precio : coche_precio,
            coche_marca : coche_marca,
            coche_modelo : coche_modelo,
            coche_foto_miniatura : coche_foto_miniatura
     },
    success:  function (response) {
      $("#myModalAJAX").modal("show");
    },
    error: function (response){
      window.location.reload();
    }
  });
};


function btn_add_carrito2(coche_id, coche_precio, coche_marca, coche_modelo, coche_foto_miniatura){
  $.ajax({
    type: "POST",
    url: "../Controller/coches/add_coche_carrito.php",
    dataType: "html",
    data: {
      coche_id : coche_id,
      coche_precio : coche_precio,
      coche_marca : coche_marca,
      coche_modelo : coche_modelo,
      coche_foto_miniatura : coche_foto_miniatura
     },
    success:  function (response) {
      $("#myModalAJAX").modal("show");
    },
    error: function (response){
      window.location.reload();
    }
  });
};

function btn_borrar_prod_carrito(coche_id){
  //alert(coche_id);
  $.ajax({
    type: "POST",
    url: "../Controller/coches/borrar_coche_carrito.php",
    dataType: "html",
    data: {
      coche_id : coche_id
     },
    success:  function (response) {
      $("#myModalAJAX2").modal("show");
    },
    error: function (response){
      window.location.reload();
    }
  });
};

function reload_html(){
      window.location.reload();
};

function likes(id){
  $.ajax({
    type: "POST",
    url: "../../Model/valoracion.php",
    dataType: "json",
    data: { id : id,
            fm : 1 },
    success:  function (response) {
      $("span#cantidad").html(response); 
    },
    error: function (response){
      console.log(response); 
    }
  });
};

function dislikes(id){
  $.ajax({
    type: "POST",
    url: "../../Model/valoracion.php",
    dataType: "json",
    data: { id : id,
            fm : 2 },
    success:  function (response) {
      $("span#cantidad2").html(response); 
    },
    error: function (response){
      console.log(response);
    }
  });
};


function btn_like(id){
  $.ajax({
    type: "POST",
    url: "../../Model/valoracion.php",
    dataType: "html",
    data: { id : id,
            fm : 3 },
    success:  function (response) {
      console.log(response);
      window.location.reload();
    },
    error: function (response){
      window.location.reload();
    }
  });
};

function btn_dislike(id){
  $.ajax({
    type: "POST",
    url: "../../Model/valoracion.php",
    dataType: "html",
    data: { id : id,
            fm : 4 },
    success:  function (response) {
      window.location.reload();
    },
    error: function (response){
      window.location.reload();
    }
  });
};




/************************/
/*      GRAFICO 1       */
/************************/
var chart = new Chartist.Line('.ct-chart1', {
  labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Agos', 'Sept', 'Oct', 'Nov', 'Dic'],
  series: [
    [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
    [4,  5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
    [5,  3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4]
  ]
}, {
  low: 0
});

// Let's put a sequence number aside so we can use it in the event callbacks
var seq = 0,
  delays = 80,
  durations = 500;

// Once the chart is fully created we reset the sequence
chart.on('created', function() {
  seq = 0;
});

// On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
chart.on('draw', function(data) {
  seq++;

  if(data.type === 'line') {
    // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
    data.element.animate({
      opacity: {
        // The delay when we like to start the animation
        begin: seq * delays + 1000,
        // Duration of the animation
        dur: durations,
        // The value where the animation should start
        from: 0,
        // The value where it should end
        to: 1
      }
    });
  } else if(data.type === 'label' && data.axis === 'x') {
    data.element.animate({
      y: {
        begin: seq * delays,
        dur: durations,
        from: data.y + 100,
        to: data.y,
        // We can specify an easing function from Chartist.Svg.Easing
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'label' && data.axis === 'y') {
    data.element.animate({
      x: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 100,
        to: data.x,
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'point') {
    data.element.animate({
      x1: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 10,
        to: data.x,
        easing: 'easeOutQuart'
      },
      x2: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 10,
        to: data.x,
        easing: 'easeOutQuart'
      },
      opacity: {
        begin: seq * delays,
        dur: durations,
        from: 0,
        to: 1,
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'grid') {
    // Using data.axis we get x or y which we can use to construct our animation definition objects
    var pos1Animation = {
      begin: seq * delays,
      dur: durations,
      from: data[data.axis.units.pos + '1'] - 30,
      to: data[data.axis.units.pos + '1'],
      easing: 'easeOutQuart'
    };

    var pos2Animation = {
      begin: seq * delays,
      dur: durations,
      from: data[data.axis.units.pos + '2'] - 100,
      to: data[data.axis.units.pos + '2'],
      easing: 'easeOutQuart'
    };

    var animations = {};
    animations[data.axis.units.pos + '1'] = pos1Animation;
    animations[data.axis.units.pos + '2'] = pos2Animation;
    animations['opacity'] = {
      begin: seq * delays,
      dur: durations,
      from: 0,
      to: 1,
      easing: 'easeOutQuart'
    };

    data.element.animate(animations);
  }
});

// For the sake of the example we update the chart every time it's created with a delay of 10 seconds
chart.on('created', function() {
  if(window.__exampleAnimateTimeout) {
    clearTimeout(window.__exampleAnimateTimeout);
    window.__exampleAnimateTimeout = null;
  }
  window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 12000);
});


/*************************/
/*     FIN GRAFICO 1     */
/*************************/

/************************/
/*      GRAFICO 2       */
/************************/

var chart = new Chartist.Pie('.ct-chart2', {
  series: [10, 20, 50, 20, 5, 50, 15],
  labels: [1, 2, 3, 4, 5, 6, 7]
}, {
  donut: true,
  showLabel: false
});

chart.on('draw', function(data) {
  if(data.type === 'slice') {
    // Get the total path length in order to use for dash array animation
    var pathLength = data.element._node.getTotalLength();

    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
    data.element.attr({
      'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
    });

    // Create animation definition while also assigning an ID to the animation for later sync usage
    var animationDefinition = {
      'stroke-dashoffset': {
        id: 'anim' + data.index,
        dur: 1000,
        from: -pathLength + 'px',
        to:  '0px',
        easing: Chartist.Svg.Easing.easeOutQuint,
        // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
        fill: 'freeze'
      }
    };

    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
    if(data.index !== 0) {
      animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
    }

    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
    data.element.attr({
      'stroke-dashoffset': -pathLength + 'px'
    });

    // We can't use guided mode as the animations need to rely on setting begin manually
    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
    data.element.animate(animationDefinition, false);
  }
});

// For the sake of the example we update the chart every time it's created with a delay of 8 seconds
chart.on('created', function() {
  if(window.__anim21278907124) {
    clearTimeout(window.__anim21278907124);
    window.__anim21278907124 = null;
  }
  window.__anim21278907124 = setTimeout(chart.update.bind(chart), 10000);
});

/*************************/
/*     FIN GRAFICO 2     */
/*************************/

/************************/
/*      GRAFICO 3       */
/************************/

new Chartist.Bar('.ct-chart3', {
  labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
  series: [
    [5, 4, 3, 7],
    [3, 2, 9, 5],
    [1, 5, 8, 4],
    [2, 3, 4, 6],
    [4, 1, 2, 1]
  ]
}, {
  // Default mobile configuration
  stackBars: true,
  axisX: {
    labelInterpolationFnc: function(value) {
      return value.split(/\s+/).map(function(word) {
        return word[0];
      }).join('');
    }
  },
  axisY: {
    offset: 20
  }
}, [
  // Options override for media > 400px
  ['screen and (min-width: 400px)', {
    reverseData: true,
    horizontalBars: true,
    axisX: {
      labelInterpolationFnc: Chartist.noop
    },
    axisY: {
      offset: 60
    }
  }],
  // Options override for media > 800px
  ['screen and (min-width: 800px)', {
    stackBars: false,
    seriesBarDistance: 10
  }],
  // Options override for media > 1000px
  ['screen and (min-width: 1000px)', {
    reverseData: false,
    horizontalBars: false,
    seriesBarDistance: 15
  }]
]);


/*************************/
/*     FIN GRAFICO 3     */
/*************************/


/*************************/
/*     GRAFICO 4     */
/*************************/

var dataChart4 = {
  
  series: [{
    value: 44
  }, {
    value: 30
  }, {
    value: 26
  }]
};

var options = {
  labelInterpolationFnc: function(value) {
    return value[0]
  }
};

var responsiveOptions = [
  ['screen and (min-width: 640px)', {
    chartPadding: 20,
    labelOffset: 80,
    labelDirection: 'explode',
    labelInterpolationFnc: function(value) {
      return value + '%';
    }
  }],
  ['screen and (min-width: 1024px)', {
    labelOffset: 80,
    chartPadding: 20
  }]
];

new Chartist.Pie('.ct-chart4', dataChart4, options, responsiveOptions);

/*************************/
/*     FIN GRAFICO 4     */
/*************************/