<template>
  <nav class="nav">
    <router-link to="/2020/1" class="nav-item nav__shops">
      <i class="fas fa-store-alt icon"></i>
      <span>店舗一覧</span>
    </router-link>
    <router-link to="/2020/1/cart" class="nav-item nav__cart">
      <i class="fas fa-shopping-cart icon"></i>
      <span>カート</span>
    </router-link>
    <router-link to="/2020/1/order-log" class="nav-item nav__log">
      <i class="fas fa-list-alt icon"></i>
      <span>注文履歴</span>
    </router-link>
    <router-link to="/2020/1/others" class="nav-item nav__others">
      <i class="fas fa-ellipsis-h icon"></i>
      <span>その他</span>
    </router-link>
  </nav>
</template>

<script>
export default {

}
</script>

<style lang="scss">
$str-color: #4b4b4b;

  .icon {
    font-size: 1.6rem;
    color: $str-color;
  }

.nav {
  display: flex;
  position: fixed;
  height: 10vh;
  bottom: 0;
  left: 0;
  background-color: #ffffff;
  align-items: center;

  &__shops {

  }
  &__cart {

  }
  &__log {

  }
  &__others {

  }

  & .router-link-exact-active {
    color: rgb(218, 105, 0);
    & .icon {
      color: orange;
    }
  }
}

.nav-item {
  display: flex;
  width: 25vw;
  height: 15vh;
  text-align: center;
  flex-direction: column;
  align-items: center;
  height: 5vh;
  color: $str-color;
}




</style>