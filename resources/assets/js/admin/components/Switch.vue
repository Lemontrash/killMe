<template>
  <div class="switch">
    <button
      type="button"
      class="true"
      @click="$emit('input', true)"
      :class="{ selected: value === true }"
    >Yes</button>
    <button
      type="button"
      class="false"
      @click="$emit('input', false)"
      :class="{ selected: value === false }"
    >No</button>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: Boolean,
      default: false,
    }
  },
  methods: {

  }
}
</script>

<style lang="scss" scoped>

.switch {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 5px;
  width: 100px;
  height: 36px;
  button {
    float: left;
    width: 50%;
    height: 36px;
    border-radius: 5px;
    color: #fff;
    &.true.selected {
      background-image: linear-gradient(140deg, #009aff 0%, #007acc);
      box-shadow: 0px 5px 15px 0 rgba(0, 154, 255, 0.2);
    }
    &.false.selected {
      background: #df0c48;
    }
  }
}

</style>
