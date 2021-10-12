<template>
  <div>
    <article class="page">
      <h2 class="page__title">店舗一覧</h2>
      <router-link class="shops" :to="shop" v-for="shop in shops" :key="shop.id">
        <div class="img-frame">
          <img class="img-frame__img" src="#" :alt="shop.name">
        </div>
        <div class="info-frame">
          <p class="info-frame__name">{{ shop.name }}</p>
          <p class="info-frame__time">{{ shop.opening_time }} ~ {{ shop.closing_time }}</p>
          <p class="info-frame__price">¥{{ shop.price_range }}</p>
        </div>
      </router-link>
    </article>
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

    let today = new Date()
    // console.log(this.shops[0].opening_time)
    // let t = new Date(today.getFullYear() + "/" + today.getMonth() + "/" + today.getDay() + " " + this.shops[0].opening_time)
    // console.log(t)
    // console.log(t.getHours() + ":" + this.zeroPadding(t.getMinutes(),2))

    for (let i = 0; i < this.shops.length; i++) {
      let opening_time = new Date(today.getFullYear() + "/" + today.getMonth() + "/" + today.getDay() + " " + this.shops[i].opening_time)
      let closing_time = new Date(today.getFullYear() + "/" + today.getMonth() + "/" + today.getDay() + " " + this.shops[i].closing_time)

      this.shops[i].opening_time = opening_time.getHours() + ":" + this.zeroPadding(opening_time.getMinutes(),2)
      this.shops[i].closing_time = closing_time.getHours() + ":" + this.zeroPadding(closing_time.getMinutes(),2)
    }
  },
  methods: {
    zeroPadding: function (num, length) {
    return ('0000000000' + num).slice(-length);
}
  }
}
</script>

<style lang="scss">
.page {
  background-color: #eeeeee;
  height: 100vh;
}

.page__title {
  font-size: 1.2rem;
}

.shops {
  display: flex;
  width: 90vw;
  height: 10vh;
  justify-content: center;
  align-items: center;
  margin-right: 5vw;
  margin-left: 5vw;
  border-radius: 12px;
  box-shadow: 2px 2px 5px 0 rgba(0,0,0,.2);
  margin-bottom: 2vh;
  background-color: #ffffff;
}

.img-frame {
  width: 50%;
  height: 100%;
}

.info-frame {
  width: 50%;
  height: 100%;
}
</style>