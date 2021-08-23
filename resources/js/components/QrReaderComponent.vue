<template>
    <div class="container">
        <p class="error" v-if="noFrontCamera">
            Front kamera topilmadi
        </p>

        <p class="error" v-if="noRearCamera">
            Orqa kamera topilmadi
        </p>
        <qrcode-stream :camera="camera" :track="paintOutline" @decode="onDecode" @init="onInit" class="qrcodeBox">
            <button @click="switchCamera">
                <img :src="'/uploads/img/camera-switch.svg'" alt="switch camera">
            </button>
        </qrcode-stream>
        <p align="center" class="text-primary"><a href="https://medialife.uz">Powered by <i class="fa fa-code mt-2"></i> <i>Jalol Saidov</i></a></p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            result: '',
            error: '',
            camera: '',
            noRearCamera: false,
            noFrontCamera: false
        }
    },
    methods: {
        paintOutline (detectedCodes, ctx) {
            for (const detectedCode of detectedCodes) {
                const [ firstPoint, ...otherPoints ] = detectedCode.cornerPoints

                ctx.strokeStyle = "red";

                ctx.beginPath();
                ctx.moveTo(firstPoint.x, firstPoint.y);
                for (const { x, y } of otherPoints) {
                    ctx.lineTo(x, y);
                }
                ctx.lineTo(firstPoint.x, firstPoint.y);
                ctx.closePath();
                ctx.stroke();
            }
        },
        onDecode (result) {
            this.result = result
            axios.post('/attendance',{
                qrcode: this.result
            }).then(response => {
                // response message
                // console.log(response.data.message);
                if(response.data.message){
                    this.$store.dispatch("getStudents", response.data.id);
                    // this.$store.dispatch("getStudent");
                    // <strong>' + response.data.message + '</strong>
                    this.$toast.show(`<strong>${response.data.message}</strong>`, '', {
                        // icon: 'fa fa-user-circle',
                        image: response.data.image,
                        imageWidth: 60,
                        iconColor: 'rgb(0, 255, 184)',
                        theme: 'dark',
                        progressBarColor: 'rgb(0, 255, 184)',
                        position: 'topCenter',
                        transitionIn: 'bounceInUp',
                        transitionOut: 'fadeOutUp',
                    });
                }else if(response.data.wrong){
                    this.$toast.show(`<strong>${response.data.wrong}</strong>`, '', {
                        // icon: 'fa fa-user-circle',
                        image: response.data.image,
                        imageWidth: 60,
                        messageColor: 'lightpink',
                        iconColor: 'rgb(0, 255, 184)',
                        theme: 'dark',
                        progressBarColor: 'rgb(0, 255, 184)',
                        position: 'topCenter',
                        transitionIn: 'bounceInUp',
                        transitionOut: 'fadeOutUp',
                    });
                }else{
                    this.$toast.warning(`<strong> ${response.data.error}</strong>`, 'Warning', {
                        position: 'topCenter',
                        transitionIn: 'bounceInDown',
                        transitionOut: 'fadeOutUp',
                    });
                }
            }).catch(error => {
                // console.log(error)
                this.$toast.error(`<strong>${'QR Code ro\'yhatga olinmagan'}</strong>`, 'Error', {
                    position: 'topCenter',
                    progressBarColor: '#333',
                    transitionIn: 'bounceInDown',
                    transitionOut: 'fadeOutUp',
                });
            })
        },
        switchCamera () {
            switch (this.camera) {
                case 'front':
                    this.camera = 'auto'
                    break
                case 'rear':
                    this.camera = 'front'
                    break
            }
        },
        async onInit (promise) {
            try {
                await promise
            } catch (error) {
                if (error.name === 'NotAllowedError') {
                    this.error = "ERROR: you need to grant camera access permisson"
                } else if (error.name === 'NotFoundError') {
                    this.error = "ERROR: no camera on this device"
                } else if (error.name === 'NotSupportedError') {
                    this.error = "ERROR: secure context required (HTTPS, localhost)"
                } else if (error.name === 'NotReadableError') {
                    this.error = "ERROR: is the camera already in use?"
                } else if (error.name === 'OverconstrainedError') {
                    this.error = "ERROR: installed cameras are not suitable"
                } else if (error.name === 'StreamApiNotSupportedError') {
                    this.error = "ERROR: Stream API is not supported in this browser"
                }

                const triedFrontCamera = this.camera === 'front'
                const triedRearCamera = this.camera === 'rear'

                const cameraMissingError = error.name === 'OverconstrainedError'

                if (triedRearCamera && cameraMissingError) {
                    this.noRearCamera = true
                }

                if (triedFrontCamera && cameraMissingError) {
                    this.noFrontCamera = true
                }

                console.error(error)
            }
        }
    }
}
</script>

<style scoped>
.error {
    font-weight: bold;
    color: red;
}
.qrcodeBox{
    border: 2px #fff solid;
}

button {
    position: absolute;
    left: 10px;
    top: 10px;
}
</style>
