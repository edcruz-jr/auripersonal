<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Política de Privacidade"/>

    <div class="min-h-screen bg-brand-light text-brand-dark relative">

        <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8 pt-16">

            <aside class="md:col-span-1 md:sticky md:top-8 h-fit space-y-4">
                <div class="flex items-center space-x-2 font-bold text-lg text-brand-dark">
                    <span>Política de Privacidade</span>
                </div>
                <nav class="space-y-2 text-sm">
                    <a href="#overview"
                        class="block p-2 rounded hover:bg-brand-accent/10 font-semibold text-brand-dark">Visão Geral</a>
                    <a href="#coleta" class="block p-2 rounded hover:bg-brand-accent/10 text-brand-primary">1. Coleta de Dados</a>
                    <a href="#uso" class="block p-2 rounded hover:bg-brand-accent/10 text-brand-primary">2. Uso das Informações</a>
                    <a href="#seguranca" class="block p-2 rounded hover:bg-brand-accent/10 text-brand-primary">3. Segurança e LGPD</a>
                </nav>
            </aside>

            <main class="md:col-span-3 space-y-8 bg-white p-8 rounded-xl shadow-sm">

                <section id="overview">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-brand-dark mb-2">Política de Privacidade</h1>
                        <Link
                            :href="route('login')"
                        >
                            <span class="text-xl font-bold">X</span>
                        </Link>
                    </div>
                    <p class="text-sm text-brand-accent mb-6">Última atualização: 26 de julho de 2026</p>
                    <p class="text-base leading-relaxed text-brand-primary">
                        A sua privacidade é de extrema importância para nós. Esta Política de Privacidade descreve como coletamos, usamos e protegemos as suas informações pessoais e dados de saúde.
                    </p>
                </section>

                <section id="coleta" class="pt-6 border-t border-gray-100">
                    <h2 class="text-xl font-bold text-brand-dark mb-4">1. Coleta de Dados</h2>
                    <p class="text-base leading-relaxed text-brand-primary">
                        Coletamos informações fornecidas diretamente por você no momento do cadastro e preenchimento de anamnese, tais como nome completo, e-mail, telefone, dados físicos e de saúde necessários para a prescrição correta dos treinos, além de dados de pagamento processados de forma segura.
                    </p>
                </section>

                <section id="uso" class="pt-6 border-t border-gray-100">
                    <h2 class="text-xl font-bold text-brand-dark mb-4">2. Uso das Informações</h2>
                    <p class="text-base leading-relaxed text-brand-primary">
                        As informações coletadas são utilizadas exclusivamente para elaborar e personalizar o seu programa de treinos, realizar o acompanhamento da sua evolução física e enviar comunicações importantes sobre o seu plano.
                    </p>
                </section>

                <section id="seguranca" class="pt-6 border-t border-gray-100">
                    <h2 class="text-xl font-bold text-brand-dark mb-4">3. Segurança e LGPD</h2>
                    <p class="text-base leading-relaxed text-brand-primary">
                        Adotamos medidas de segurança para proteger os seus dados conforme a Lei Geral de Proteção de Dados (LGPD). Você tem o direito de solicitar o acesso, correção ou exclusão dos seus dados a qualquer momento pelos nossos canais de atendimento.
                    </p>
                </section>

            </main>
        </div>
    </div>
</template>