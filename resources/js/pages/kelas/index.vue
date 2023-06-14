<template>
  <div class="card">
      <div class="card-body">
          <template>
              <v-toolbar flat>
                  <v-toolbar-title>Faça uma gravação</v-toolbar-title>
                  <v-divider class="mx-4" inset vertical></v-divider>
                  <v-spacer></v-spacer>
              </v-toolbar>
          </template>

          <template>
              <div class="container">
                  <h1 class="text-center">Clique no Botão Gravar: Atenção ! O tempo de duração é de até 1 minuto</h1>
                      <div class="row" id="app" style="margin-left: 30rem;">
                          <div class="col-md-6">
                              <div id="my_camera"></div>
                              <br/>
                              <input type="hidden" name="image" class="image-tag">
                          </div>
                      </div>
              </div>
          </template>

          <template>
                  <div id="concluir" style="display: none;">
                      <br>
                  </div>
      
                  <div style="margin-left: 25rem;">
                      <video id="video" width="320" height="240" autoplay></video>
                  </div>
      
                  <div id="timer" style="display: none;">
                      <TimerComponent></TimerComponent>
                  </div>
                  <div style="margin-left: 25rem;">
                      <v-btn color="primary" @click.prevent="cameraButton()" id="start-camera" dark class="mb-2">Start Camera</v-btn>
                      <v-btn color="primary" dark class="mb-2" @click.prevent="startButton()" id="start-record">Start Recording</v-btn>
                      <v-btn color="primary" dark class="mb-2" @click.prevent="stopButton()" id="stop-record">Stop Recording</v-btn>
                  </div>
          </template>

      </div>
  </div>
</template>


<script>
import TimerComponent from '../../components/TimerComponent.vue'
var camera_stream = null;
var media_recorder = null;
var blobs_recorded = [];

  export default {
      data() {
          return {
          }
      },
components: {
  TimerComponent
},      
methods: {
      startButton() {
          this.$noty.success('Gravaçâo Inicializada com Sucesso');
          media_recorder = new MediaRecorder(camera_stream, { mimeType: 'video/webm' });

          media_recorder.addEventListener('dataavailable', function(e) {
              blobs_recorded.push(e.data);
              document.getElementById('timer').style.display = "block";
          });

          media_recorder.start(1000);
      },

      async stopButton() {
        this.$noty.success('Gravaçâo finalizada com Sucesso');
        document.getElementById('timer').style.display = "none";
        let video_local = new File(blobs_recorded, 'recording.webm', { type: 'video/webm' });
        let data = new FormData();
        data.append('file', video_local);

          axios.post('/api/media', data).then((response) => {
                  if (response.data.status) {
                      this.$noty.success(response.data.messege);
                  }
              }).catch((erorr) => {
                  this.erorr = erorr.response.data.errors
          })
      },

      async cameraButton() {
          this.$noty.success('Câmera inicializada com Sucesso');
          camera_stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
          video.srcObject = camera_stream;
      },
},
}

</script>

<style>
body {
display: flex;
justify-content: center;
}

#start-record {
background-color: green;
}

#stop-record {
background-color: red;
}

.web-camera-container {
margin-top: 2rem;
margin-bottom: 2rem;
padding: 2rem;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
border: 1px solid #ccc;
border-radius: 4px;
width: 500px;


.camera-button {
  margin-bottom: 2rem;
}

.camera-box {    
  .camera-shutter {
    opacity: 0;
    width: 450px;
    height: 337.5px;
    background-color: #fff;
    position: absolute;
    
    &.flash {
      opacity: 1;
    }
  }
}

.camera-shoot {
  margin: 1rem 0;
  
  button {
    height: 60px;
    width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 100%;
    
    img {
      height: 35px;
      object-fit: cover;
    }
  }
}

.camera-loading {
  overflow: hidden;
  height: 100%;
  position: absolute;
  width: 100%;
  min-height: 150px;
  margin: 3rem 0 0 -1.2rem;
  
  ul {
    height: 100%;
    position: absolute;
    width: 100%;
    z-index: 999999;
    margin: 0;
  }
  
  .loader-circle {
    display: block;
    height: 14px;
    margin: 0 auto;
    top: 50%;
    left: 100%;
    transform: translateY(-50%);
    transform: translateX(-50%);
    position: absolute;
    width: 100%;
    padding: 0;
    
    li {
      display: block;
      float: left;
      width: 10px;
      height: 10px;
      line-height: 10px;
      padding: 0;
      position: relative;
      margin: 0 0 0 4px;
      background: #999;
      animation: preload 1s infinite;
      top: -50%;
      border-radius: 100%;
      
      &:nth-child(2) {
        animation-delay: .2s;
      }
      
      &:nth-child(3) {
        animation-delay: .4s;
      }
    }
  }
}

@keyframes preload {
  0% {
    opacity: 1
  }
  50% {
    opacity: .4
  }
  100% {
    opacity: 1
  }
}
}
</style>
