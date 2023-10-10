{{-- <html>
  <head>
    <meta charset="utf-8" />
    <title>Sign in with an ArcGIS account</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <!-- Load Esri Leaflet Vector from CDN -->
    <script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js" crossorigin=""></script>

 <script src="https://unpkg.com/@esri/arcgis-rest-request@3.6.0/dist/umd/request.umd.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://js.arcgis.com/4.26/"></script>



    <style>
      html,
      body,
      #map {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #323232;
      }
    </style>
  </head>
  <body>
    <style>
      #auth {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1000;
        background: white;
        padding: 1em;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.65);
        border-radius: 4px;
      }

      #auth input {
        display: inline-block;
        border: 1px solid #999;
        font-size: 14px;
        border-radius: 4px;
        height: 28px;
        line-height: 28px;
      }
    </style>
    <div id="map"></div>
    <div id="auth">
      <a href="#" id="sign-in">Sign In</a>
    </div>
    <script>
        axios({
      method: 'get',
      url: "https://www.arcgis.com/sharing/oauth2/token?client_id=Eg0PDju5clxYEptF&client_secret=1100d050a03c43d3b04e4d11f0a11817&grant_type=client_credentials",
      responseType: 'json',
      ContentType: "application/json",
      })
      .then(function (response) {
        var token=response.data.access_token;
        console.log("OAuth token is: "+token)  
        window.localStorage.setItem('esritoken', token);

        })
        var storedToken=window.localStorage.getItem('esritoken'); 
      const apiKey = "AAPK97c7d454babf4e118669bc574f29a411ffsRAgxjJ4pHKdRU9j9VHxczsO7gvIT1qGpQd6J0Uv8Ar5cW0vvDQ4NqkDTF8HwY";

      const clientID = "Eg0PDju5clxYEptF";
      let accessToken;
      const callbacks = [];
      const protocol = window.location.protocol;
      const callbackPage = protocol + "./oauth-callback.html";

      const authPane = document.getElementById("auth");
      const signInButton = document.getElementById("sign-in");

      // this function will open a window and start the oauth process
      function oauth(callback) {
        if (accessToken) {
          callback(accessToken);
        } else {
          callbacks.push(callback);
          window.open(
            "https://www.arcgis.com/sharing/oauth2/authorize?client_id=" +
              clientID +
              "&response_type="+
              storedToken+
              "&expiration=20160000&redirect_uri=https://rinm8n4id9eojflo.maps.arcgis.com/home/item.html?id=3b75b4838d954727b2fba98ccf24c51d" +
              window.encodeURIComponent(callbackPage),
            "oauth",
            "height=400,width=600,menubar=no,location=yes,resizable=yes,scrollbars=yes,status=yes"
          );
        }
      }

      // this function will be called when the oauth process is complete
      window.oauthCallback = function (storedToken) {
        L.esri.get(
          "https://rinm8n4id9eojflo.maps.arcgis.com/home/item.html?id=3b75b4838d954727b2fba98ccf24c51d",
          {
            token: storedToken
          },
          function (error, response) {
            if (error) {
              return;
            }

            authPane.innerHTML = "<label>Hi " + response.user.username + ' your token is <input value="' + storedToken + '"></label>';
          }
        );
      };

      signInButton.addEventListener("click", function (e) {
        oauth();
        e.preventDefault();
      });

      // make a new map and basemap
      const map = L.map("map").setView([39.36, -96.19], 4);

      L.esri.Vector.vectorBasemapLayer("ArcGIS:LightGray", {
        apikey: apiKey
      }).addTo(map);
    </script>
  </body>
</html> --}}

{{-- <!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>ArcGIS REST JS Browser OAuth2</title>
    <script src="assets/js/jquery.min.js"></script>

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    />
    <style>
      body {
        font-family: monospace;
        color: black;
        font-size: 20px;
      }
      pre {
        overflow: auto;
        padding: 1rem;
      }

      .col-xs-12 {
        margin-top: 10%;
      }

      #withPopupButton,
      #signOutButton {
        font-size: 20px;
      }
    </style>
  </head>
  <body>
    <div id="app-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <!-- Event listeners planned to be added to these buttons. -->
            <button class="btn btn-primary btn-block" id="withPopupButton">Sign In</button>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 text-center">
            <p id="sessionInfo" class="info-panel">
              <!-- Information will be injected here. -->
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 text-center">
            <!-- Event listeners will be added to these buttons. -->
            <button class="btn btn-primary btn-block btn-warning" id="signOutButton">Sign Out</button>
          </div>
        </div>
      </div>
    </div>

    <script type="module">
      import { ArcGISIdentityManager } from 'https://cdn.skypack.dev/@esri/arcgis-rest-request@4.0.0';

      let session = null;
      const clientId = "Eg0PDju5clxYEptF";
      const redirectUri = window.location.origin + "/authenticate.html";

      const serializedSession = localStorage.getItem("__ARCGIS_REST_USER_SESSION__"); // Check to see if there is a serialized session in local storage.

      if (serializedSession !== null && serializedSession !== "undefined") {
        session = ArcGISIdentityManager.deserialize(serializedSession);
      }

      function updateSessionInfo(session) {
        let sessionInfo = document.getElementById("sessionInfo");

        if (session) {
          sessionInfo.classList.remove("bg-info");
          sessionInfo.classList.add("bg-success");
          sessionInfo.innerHTML = "Logged in as " + session.username;
          localStorage.setItem("__ARCGIS_REST_USER_SESSION__", session.serialize());
        } else {
          sessionInfo.classList.remove("bg-success");
          sessionInfo.classList.add("bg-info");
          sessionInfo.innerHTML = "Log in to start a session.";
        }
      }

      updateSessionInfo(session);


      document.getElementById("withPopupButton").addEventListener("click", (event) => {
        // Begin an OAuth2 login using a popup.
        $("#user_username").val('hi');
        ArcGISIdentityManager.beginOAuth2({
          clientId: "Eg0PDju5clxYEptF",
          redirectUri: "https://rinm8n4id9eojflo.maps.arcgis.com/home/item.html?id=3b75b4838d954727b2fba98ccf24c51d",
          popup: false
        })
          .then((newSession) => {
            // Upon a successful login, update the session with the new session.
            session = newSession;
            console.log(session);
            updateSessionInfo(session);
          })
          .catch((error) => {
            console.log(error);
          });
        event.preventDefault();
      });

      document.getElementById("signOutButton").addEventListener("click", (event) => {
        event.preventDefault();
        // call the signOut method to invalidate the token.
        session.signOut().then(()=>{
          session = null; // Clear the session from memory.
          localStorage.removeItem("__ARCGIS_REST_USER_SESSION__");
          updateSessionInfo();
        });
      });

    </script>

  </body>
</html> --}}


