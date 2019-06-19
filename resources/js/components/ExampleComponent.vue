<template>
  <div>
    <!-- <b-button @click="downloadall()">download</b-button> -->
    <b-button @click="downloadAtIndex(250)">download</b-button>
    <div style="width:100%; height:100%; float:left">
      <!-- <div ref="printMe0" v-if="users[0]">
        <card :user="users[0]" :index="0" size="x"/>
      </div>-->

      <!-- <div ref="printMe_0" v-if="users[0]">
        <card :user="users[0]" :index="0" size="x"/>
      </div>-->

      <br>
      <!-- <b-button @click="download((users[0].image),0)">download</b-button> -->
    </div>

    <div v-for="(user, index) in users" :key="index">
      <div style="width:100%; height:100%; float:left">
        <div :ref="`printMe_${index}`" v-if="user">
          <card :user="user" :index="index" size="x"/>
        </div>

        <br>
        <br>
        <!-- <b-button @click="download(user.image,index)">download</b-button> -->
        <!-- {{download(user.image,index)}} -->
      </div>
    </div>

    <img :src="output">
  </div>
</template>

<script>
import { usersRef } from "../firebaseConfig.js";
import Card from "../components/Card";
export default {
  mounted() {
    console.log("Component mounted.");
  },
  components: {
    Card
  },
  firebase: {
    users: usersRef
  },
  methods: {
    async downloadall() {
      let index = 0;
      //   this.users.forEach(user => {
      //     this.download(user.image, index);
      //     index = index + 1;

      //     // console.log(user);
      //   });

      this.asyncForEach(this.users, async user => {
        await this.download(user.image, index);
        index = index + 1;
        console.log(index);
      });
      console.log("Done");
    },
    async asyncForEach(array, callback) {
      for (let index = 0; index < array.length; index++) {
        await callback(array[index], index, array);
      }
    },
    async downloadAtIndex(index) {
      if (index <= this.users.length) {
        await this.download(this.users[index].image, index);
        index = index + 1;
        console.log(index);
        this.downloadAtIndex(index);
      }
    },
    async download(image, index) {
      //   console.log(`image`, image);
      let name = this.getImageName(image);
      //   console.log(`name`, name);
      //   console.log(`index`, index);
      //   console.log(this.$refs);
      //   console.log(this.$refs[`printMe${index}`]);
      //   console.log(this.$refs.printMe0);
      //   const el = this.$refs[`printMe_${index}`].value;
      //   const el = this.$refs[`printMe_0`];
      //   const el = this.$refs[`printMe_0`];
      let refIndex = `printMe_${index}`;
      //   console.log(refIndex);
      const el = this.$refs[refIndex][0];
      //   const el2 = this.$refs[`printMe0`];
      //   console.log(el);
      //   console.log(el2);
      // add option type to get the image version
      // if not provided the promise will return
      // the canvas.
      const options = {
        type: "dataURL"
      };

      let canvas = await this.$html2canvas(el, options);
      //   console.log(canvas);
      //   // this.output = canvas;
      //   this.toBlob(canvas, name);
      fetch(canvas)
        .then(res => res.blob())
        .then(blob => {
          const file = new File([blob], name, {
            type: "image/jpeg"
          });
          let parm = new FormData();
          parm.append("image", file);

          const config = {
            headers: {
              "Access-Control-Allow-Origin": "*",
              "Access-Control-Allow-Methods":
                "GET,PUT,POST,DELETE,PATCH,OPTIONS",
              "Content-Type": "multipart/form-data"
            }
          };

          console.log(`downloadFile`, file);
          axios.post("api/up", parm, config).then(res => {
            console.log(res.data);
            return res.data;
          });
        });
    },
    getImageName(url) {
      // let name = url;
      let name = url.substring(89);
      let index = name.indexOf("?");
      name = name.substring(0, index);
      // name = splits[2];
      return name;
    },
    async save(url, name) {
      let downloadFile = await this.toBlob(url);

      // axios.post("http://muangapi.idealand.work/up", parm, config).then(res => {
      //   console.log(res.data);
      // });
    },
    toBlob(url, name) {
      fetch(url)
        .then(res => res.blob())
        .then(blob => {
          const file = new File([blob], name, {
            type: "image/jpeg"
          });
          let parm = new FormData();
          parm.append("image", file);

          const config = {
            headers: {
              "Access-Control-Allow-Origin": "*",
              "Access-Control-Allow-Methods":
                "GET,PUT,POST,DELETE,PATCH,OPTIONS",
              "Content-Type": "multipart/form-data"
            }
          };

          console.log(`downloadFile`, file);
          axios.post("api/up", parm, config).then(res => {
            console.log(res.data);
          });
        });
    }
  }
};
</script>
