<template>
  <div>
    <div class="shop" v-for="shop in shops" :key="shop.id">
      {{ shop.name }}
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      shops: []
    }
  },
  created: async function() {
    const shops = await this.$getApi('shops')
    this.shops = shops
    console.log(this.shops)
  }
}
</script>

<style lang="scss">

</style>