<template>
  <div class="nun">
    <div class="s-card text-white" :class="classs('','ying')">
      <div class="s-top clearfix h-500" v-if="size == `x`">
        <div class="float-left" style="margin-left:15px; margin-top:20px;">
          <h5>Visitor.</h5>
          <h2>{{index+1}}</h2>
        </div>
        <div class="float-right">
          <img src="/logo.png" width="100" style="margin-left:-150px;">
        </div>
      </div>
      <div v-else-if="size == `y`" class="bg2 clearfix h-600">
        <div class="float-left" style="margin-left:15px; margin-top:20px;">
          <h5>Visitor.</h5>
          <h2>{{index+1}}</h2>
        </div>

        <div class="logo-right">
          <img src="/logo.png" width="100" style="margin-left:-150px;">
        </div>

        <h1>{{user.name}}</h1>
      </div>
      <div v-if="size == `y`" class="bg3 clearfix h-600"></div>
      <div class="s-img">
        <img
          :src="`/users/${getImageName(user.image)}`"
          :height="windowHeight"
          width="100%"
          v-if="size == `x`"
        >
        <img
          :src="`/users/${getImageName(user.image)}`"
          :height="windowHeight/2"
          width="100%"
          v-else-if="size == `y`"
        >
        <!-- <img :src="getImageName(user.image)" :height="windowHeight" width="100%" v-if="size == `x`">
        <img :src="user.image" :height="windowHeight/2" width="100%" v-else-if="size == `y`">-->
      </div>
      <div
        class="s-bottom pt-4 text-center"
        :class="size == 'x' ? 'h500':'h250'"
        v-if="size == `x`"
      >
        <h1>{{user.name}}</h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["index", "user", "size"],
  methods: {
    classs(classs, classs2) {
      return this.size == "x" ? classs : classs2;
    },
    getImageName(url) {
      // let name = url;
      let name = url.substring(89);
      let index = name.indexOf("?");
      name = name.substring(0, index);
      // name = splits[2];
      return name;
    }
  }
};
</script>

<style lang="scss">
@import "node_modules/bootstrap/scss/bootstrap";
@import "node_modules/bootstrap-vue/src/index.scss";

img {
  object-fit: cover;
}
.nun {
  position: relative;
  overflow: hidden;
}
.bg2 {
  // background: url("/left-bg.png") no-repeat;
  /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#52d0e3+0,52d0e3+100&1+0,0+98 */
  background: -moz-linear-gradient(
    left,
    rgba(82, 208, 227, 1) 0%,
    rgba(82, 208, 227, 0) 98%,
    rgba(82, 208, 227, 0) 100%
  ); /* FF3.6-15 */
  background: -webkit-linear-gradient(
    left,
    rgba(82, 208, 227, 1) 0%,
    rgba(82, 208, 227, 0) 98%,
    rgba(82, 208, 227, 0) 100%
  ); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(
    to right,
    rgba(82, 208, 227, 1) 0%,
    rgba(82, 208, 227, 0) 98%,
    rgba(82, 208, 227, 0) 100%
  ); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#52d0e3', endColorstr='#0052d0e3',GradientType=1 ); /* IE6-9 */

  background-size: contain;
  width: 100%;
  position: absolute;
  left: -100px;
  padding-left: 100px;
  h1 {
    position: absolute;
    top: 300px;
    // top: 500px;
    left: 150px;
  }
}
.bg3 {
  // background: url("/right-bg.png") no-repeat;
  /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#7db9e8+0,52d0e3+100&0+0,1+100 */
  background: -moz-linear-gradient(
    left,
    rgba(125, 185, 232, 0) 0%,
    rgba(82, 208, 227, 1) 100%
  ); /* FF3.6-15 */
  background: -webkit-linear-gradient(
    left,
    rgba(125, 185, 232, 0) 0%,
    rgba(82, 208, 227, 1) 100%
  ); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(
    to right,
    rgba(125, 185, 232, 0) 0%,
    rgba(82, 208, 227, 1) 100%
  ); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#007db9e8', endColorstr='#52d0e3',GradientType=1 ); /* IE6-9 */
  background-size: contain;
  width: 100%;
  position: absolute;
  left: 450px;
}
.s-top {
  /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#52d0e3+0,7db9e8+100&1+0,0+100 */
  background: -moz-linear-gradient(
    top,
    rgba(82, 208, 227, 1) 0%,
    rgba(125, 185, 232, 0) 100%
  ); /* FF3.6-15 */
  background: -webkit-linear-gradient(
    top,
    rgba(82, 208, 227, 1) 0%,
    rgba(125, 185, 232, 0) 100%
  ); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(
    to bottom,
    rgba(82, 208, 227, 1) 0%,
    rgba(125, 185, 232, 0) 100%
  ); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#52d0e3', endColorstr='#007db9e8',GradientType=0 ); /* IE6-9 */
  // background: url("/bg-top.png") no-repeat;
  background-size: contain;
  width: 100%;
  position: absolute;
  z-index: 999;
  padding: 15px;
}
.h-600 {
  margin-top: 0;
  height: 600px;
}
.h-500 {
  margin-top: -90px;
  padding-top: 90px;
  height: 500px;
}
.h-250 {
  height: 300px;
}
.s-bottom {
  bottom: -100px;
  // background: url("/bg-bot.png") no-repeat;
  /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#7db9e8+0,52d0e3+100&0+0,1+100 */
  background: -moz-linear-gradient(
    top,
    rgba(125, 185, 232, 0) 0%,
    rgba(82, 208, 227, 1) 100%
  ); /* FF3.6-15 */
  background: -webkit-linear-gradient(
    top,
    rgba(125, 185, 232, 0) 0%,
    rgba(82, 208, 227, 1) 100%
  ); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(
    to bottom,
    rgba(125, 185, 232, 0) 0%,
    rgba(82, 208, 227, 1) 100%
  ); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#007db9e8', endColorstr='#52d0e3',GradientType=0 ); /* IE6-9 */

  background-size: contain;
  width: 100%;
  // bottom: 0;
  height: 321px;
  position: absolute;
  z-index: 999;
  padding: 15px;
  padding-top: 250px !important;
  h1 {
    margin-top: 120px !important;
    display: inline-block;
    background-size: contain;
    // position: absolute;
    // bottom: 10px;
    // background: url('/bg-text.png') no-repeat;
    background-size: contain;

    position: absolute;
    top: 0;
    left: 40px;
  }
}
.logo-right {
  position: absolute;
  right: -100px;
  top: 0;
  img {
    position: relative;
    z-index: 10000;
  }
}
</style>
