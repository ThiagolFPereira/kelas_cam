<template>
  <h1>
  {{ timerCount }}
</h1>
</template>

<script>

  export default {

      data() {
          return {
              timerCount: 60
          }
      },

      watch: {

          timerCount: {
              handler(value) {

                  if (value > 0) {
                      setTimeout(() => {
                          this.timerCount--;
                      }, 1000);
                  }

              },
              immediate: true // This ensures the watcher is triggered upon creation
          }

      }
  }

</script>