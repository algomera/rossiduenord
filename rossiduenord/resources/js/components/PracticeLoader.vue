<template>
    <div class="opacity">
        <div
            class="bg-white rounded p-5 d-flex flex-column centered justify-content-center align-items-center"
        >
            <atom-spinner
                :animation-duration="1000"
                :size="120"
                color="#61a4d7"
            />
            <div class="w-100 mt-3">
                <h3 class="text-center">Stiamo generando una nuova pratica.</h3>
                <h5 class="text-center">Non chiudere la schermata 😁</h5>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PracticeLoader",
};
</script>

<style>
.centered {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 999;
}
</style>
