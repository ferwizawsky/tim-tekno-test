<script setup lang="ts">
function kelompokkanBilanganGenap(
  JumlahBilangan: number,
  JumlahKelompok: number
): number[][] {
  const bilanganGenap: number[] = Array.from(
    { length: JumlahBilangan },
    (_, i) => 2 * (i + 1)
  );
  const kelompok: number[][] = Array.from({ length: JumlahKelompok }, () => []);

  bilanganGenap.forEach((bilangan, index) => {
    kelompok[index % JumlahKelompok].push(bilangan);
  });

  return kelompok;
}

function buatBangun(JumlahBaris: number): string[] {
  const bangun: string[] = [];
  for (let i = JumlahBaris; i > 0; i--) {
    const baris: string = "*".repeat(2 * i - 1);
    bangun.push(baris);
  }
  return bangun;
}

const JumlahBilangan: number = 10;
const JumlahKelompok: number = 2;
const hasilFungsi1: number[][] = kelompokkanBilanganGenap(
  JumlahBilangan,
  JumlahKelompok
);
console.log("Fungsi 1:");
hasilFungsi1.forEach((kelompok) => {
  console.log(kelompok);
});

const JumlahBaris: number = 5;
const hasilFungsi2: string[] = buatBangun(JumlahBaris);
console.log("\nFungsi 2:");
hasilFungsi2.forEach((baris) => {
  console.log(baris);
});

const JSONEXample = kelompokkanBilanganGenap.toString();
const JSONEXample1 = buatBangun.toString();
</script>
<template>
  <main class="mx-auto max-w-[1208px] pt-4">
    <ClientOnly>
      <div>
        <div>
          <div class="pt-10">Logika Functionnya seperti dibawah Ini :</div>
          <div class="font-semibold text-xl pt-6">Function 1</div>
          <div>
            <highlightjs autodetect :code="JSONEXample" />
            <div class="pt-2">
              <div>Input:</div>
              <div>
                Jumlah Bilangan : {{ JumlahBilangan.toString() }} dan Jumlah
                Kelompok {{ JumlahKelompok.toString() }}
              </div>
            </div>
            <div class="pt-2">
              <div>Hasil:</div>
              <div>{{ hasilFungsi1 }}</div>
            </div>
          </div>

          <div class="font-semibold text-xl pt-10">Function 2</div>
          <div>
            <highlightjs autodetect :code="JSONEXample1" />
            <div class="pt-2">
              <div>Input:</div>
              <div>Jumlah Baris : {{ JumlahBaris.toString() }}</div>
            </div>
            <div class="pt-2">
              <div>Hasil:</div>
              <div>{{ hasilFungsi2 }}</div>
            </div>
          </div>
        </div>
      </div>
    </ClientOnly>
  </main>
</template>
