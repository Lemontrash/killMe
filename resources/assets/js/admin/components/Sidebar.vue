<template>
  <aside class="profile-nav">
    <ul class="links-container">
      <li class="link-item" :class="{ selected: $route.name == 'index' }">
        <router-link to="/">
          <i class="fa fa-check-circle"></i>
          <span>New Users</span>
        </router-link>
      </li>
      <li class="link-item" :class="{ selected: $route.name == 'accepted' }">
        <router-link to="/accepted">
          <i class="fa fa-check-circle"></i>
          <span>Accepted Users</span>
        </router-link>
      </li>
    </ul>
  </aside>
</template>

<script>
export default {
}
</script>

<style lang="scss" scoped>

aside {
  height: 100%;
  top: 0;
  left: 0;
  .link-item {
    height: 80px;
    font-size: 14px;
    vertical-align: middle;
    padding: 0;
    &.selected {
      color: #fff;
      background-color: #343c53;
      box-shadow: -13px 7.5px 20px 0 rgba(24, 28, 38, 0.4);
      span {
        color: #fff;
        font-size: 16px;
        font-weight: bold;
      }
    }
    a {
      display: flex;
      width: 100%;
      height: 100%;
      flex-direction: row;
      justify-content: flex-start;
      align-items: center;
      padding: 30px;
      color: rgba(255, 255, 255, 0.5);
      &:hover {
        span {
          color: #fff;
          font-size: 16px;
          font-weight: bold;
        }
      }
    }
    i {
      color: #009aff;
      width: 20px;
    }

  }
}

</style>
