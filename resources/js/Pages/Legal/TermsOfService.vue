<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Termos de Serviço"/>

    <div class="min-h-screen bg-brand-light text-brand-dark relative">

        <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8 pt-16">

            <aside class="md:col-span-1 md:sticky md:top-8 h-fit space-y-4">
                <div class="flex items-center space-x-2 font-bold text-lg text-brand-dark">
                    <span>Termos de Serviço</span>
                </div>
                <nav class="space-y-2 text-sm">
                    <a href="#overview"
                        class="block p-2 rounded hover:bg-brand-accent/10 font-semibold text-brand-dark">Visão Geral</a>
                    <a href="#servicos" class="block p-2 rounded hover:bg-brand-accent/10 text-brand-primary">1. Os serviços
                        que prestamos</a>
                    <a href="#responsabilidade" class="block p-2 rounded hover:bg-brand-accent/10 text-brand-primary">2. Saúde
                        e Responsabilidade</a>
                    <a href="#pagamentos" class="block p-2 rounded hover:bg-brand-accent/10 text-brand-primary">3. Planos e
                        Pagamentos</a>
                </nav>
            </aside>

            <main class="md:col-span-3 space-y-8 bg-white p-8 rounded-xl shadow-sm">

                <section id="overview">

                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-brand-dark mb-2">Termos de Serviço - Visão Geral</h1>
                        <Link
                            :href="route('login')"
                        >
                            <span class="text-xl font-bold">X</span>
                        </Link>
                    </div>
                    <p class="text-sm text-brand-accent mb-6">Última atualização: 26 de julho de 2026</p>
                    <p class="text-base leading-relaxed text-brand-primary">
                        Bem-vindo à nossa consultoria esportiva. Estes Termos de Serviço regem o seu acesso e uso dos
                        programas de treino, site, aplicativos e serviços oferecidos.
                    </p>
                </section>

                <section id="servicos" class="pt-6 border-t border-gray-100">
                    <h2 class="text-xl font-bold text-brand-dark mb-4">1. Os serviços que prestamos</h2>
                    <p class="text-base leading-relaxed text-brand-primary">
                        Fornecemos prescrição de treinos personalizados, acompanhamento de cargas e orientações de saúde
                        física alinhadas aos seus objetivos individuais através da nossa plataforma digital.
                    </p>
                </section>

                <section id="responsabilidade" class="pt-6 border-t border-gray-100">
                    <h2 class="text-xl font-bold text-brand-dark mb-4">2. Saúde e Responsabilidade do Aluno</h2>
                    <p class="text-base leading-relaxed text-brand-primary">
                        O aluno declara estar em plenas condições de saúde para a prática de atividades físicas, sendo
                        obrigatória a avaliação médica prévia. A execução correta dos movimentos descritos nos treinos é
                        de inteira responsabilidade do praticante.
                    </p>
                </section>

                <section id="pagamentos" class="pt-6 border-t border-gray-100">
                    <h2 class="text-xl font-bold text-brand-dark mb-4">3. Planos e Pagamentos</h2>
                    <p class="text-base leading-relaxed text-brand-primary">
                        Os pagamentos são processados conforme o plano escolhido. O cancelamento pode ser feito a
                        qualquer momento pelo painel do aluno, interrompendo as cobranças para o ciclo seguinte.
                    </p>
                </section>

            </main>
        </div>
    </div>
</template>