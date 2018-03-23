/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    capturePhoto: function(){
    navigator.camera.getPicture(onSuccess, onFail, { 
        quality: 50,
        destinationType: Camera.DestinationType.DATA_URL,
        allowEdit : false,
        saveToPhotoAlbum:true
    });
    

    function onSuccess(imageData) {
        document.getElementById("capture").textContent ='carregando...';
        var image = document.getElementById('myImage');
        image.src = "data:image/jpeg;base64,"+imageData;
              
        document.getElementById('arquivo').style.display="none";
        document.getElementById("capture").textContent ='imagem carregada.';
        document.getElementById('capture').disabled = true; 
        document.getElementById('btnComunicar').click();

    }
    function onFail(message) {
        alert('Failed because: ' + message);
    }
    },
    getImage: function () {
    navigator.camera.getPicture(onSuccess, onFail, { 
    destinationType: navigator.camera.DestinationType.DATA_URL,
    sourceType: navigator.camera.PictureSourceType.PHOTOLIBRARY
    });

    function onSuccess(imageData) {
        document.getElementById("capture").textContent ='carregando...';
        var image = document.getElementById('myImage');
        image.src = "data:image/jpeg;base64,"+imageData;
        
        document.getElementById('arquivo').style.display="none";
        document.getElementById("capture").textContent ='imagem carregada.';
        document.getElementById('capture').disabled = true;
    }
    function onFail(message) {
    alert("Get image failed: " + message);
    }
    },

    onDeviceReady: function() {
        app.receivedEvent('deviceready');
        
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
};
