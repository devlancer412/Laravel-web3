var ww = window.innerWidth,
  wh = window.innerHeight;
var torusRadius = 200;
var torusDiameter = 25;
var rings = 180;
var detail = 30;

var renderer = new THREE.WebGLRenderer({
  canvas: document.querySelector("canvas"),
  antialias : true
});
renderer.setSize(ww, wh);

var scene = new THREE.Scene();
scene.fog = new THREE.Fog(0x000000, torusRadius * 0.8, torusRadius * 1.1);

var camera = new THREE.PerspectiveCamera(60, ww / wh, 1, torusRadius * 1.1);
camera.position.set(Math.cos(0) * torusRadius, 0, Math.sin(0) * torusRadius);

var light = new THREE.PointLight(0xffffff, 2, 150);
light.position.set(Math.cos(-Math.PI * 0.3) * torusRadius, 0, Math.sin(-Math.PI * 0.3) * torusRadius);
scene.add(light);

TweenMax.to(light.position, 6, {
  x : Math.cos(Math.PI * 0.3) * torusRadius,
  z : Math.sin(Math.PI * 0.3) * torusRadius,
  ease: Power2.easeInOut,
  repeat:-1,
  yoyo :true
});

window.addEventListener("resize", function() {
  ww = window.innerWidth;
  wh = window.innerHeight;

  camera.aspect = ww / wh;
  camera.updateProjectionMatrix();

  renderer.setSize(ww, wh);
});
var mouse = new THREE.Vector2(0,0);

var torus = new THREE.Object3D();
TweenMax.to(torus.rotation, 90,{
  y:  Math.PI * 2,
  ease: Linear.easeNone,
  repeat: -1
});
scene.add(torus);

function createTorus() {
  var geometry = new THREE.BoxBufferGeometry(2, 2, 2);
  for (var i = 0; i < rings; i++) {
    var u = i / rings * Math.PI * 2;
    var ring = new THREE.Object3D();
    ring.position.x = torusRadius * Math.cos(u);
    ring.position.z = torusRadius * Math.sin(u);
    var colorIndex = Math.round(Math.abs(noise.simplex2(Math.cos(u) * 0.5, Math.sin(u) * 0.5)) * 180);
    var color = new THREE.Color("hsl(" + colorIndex + ",50%,50%)");
    var material = new THREE.MeshLambertMaterial({
      color: color
    });
    for (var j = 0; j < detail; j++) {
      var v = j / detail * Math.PI * 2;
      var x = torusDiameter * Math.cos(v) * Math.cos(u);
      var y = torusDiameter * Math.sin(v);
      var z = torusDiameter * Math.cos(v) * Math.sin(u);
      var size = (Math.random() * 5) + 0.1;
      var cube = new THREE.Mesh(geometry, material);
      cube.scale.set(size, size, size);
      cube.position.set(x, y, z);
      var rotation = (Math.random()-0.5)*Math.PI*4;
      cube.rotation.set(rotation, rotation, rotation);
      ring.add(cube);
    }
    torus.add(ring);
  }
}

function render() {
  requestAnimationFrame(render);
  camera.lookAt(light.position);
  renderer.render(scene, camera);
}

createTorus();
requestAnimationFrame(render);