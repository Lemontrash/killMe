<template>
  <div id="admin">
    <side-bar/>
    <router-view class="profile-content" id="content"/>
  </div>
</template>

<script>
import SideBar from './SideBar.vue'
export default {
  components: {
    SideBar
  }
}
</script>

<style lang="scss" scoped>

.profile-content {
  margin-top: 0;
}

</style>
