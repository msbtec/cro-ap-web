@extends('site.master')

@push('css')

@endpush

@push('meta')

@endpush

@section('content')


    <div class="container mt-3">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página inicial</a></li>
                    <li class="breadcrumb-item active"><a href="#">Perguntas frequentes</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="titulos vermelho">Perguntas frequentes</h5>
                <div class="text-muted mb-3">
                    Pensando em esclarecer e informar seus inscritos, a Comissão de Acolhimento preparou esse rol de perguntas e respostas sobre as principais consultas jurídicas que nos foram apresentadas
                    <hr>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-8">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida2" aria-expanded="false" aria-controls="collapseTwo">
                                    Tenho direito ao Adicional de Insalubridade?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>O profissional que trabalha sob o regime celetista, isto &eacute;, regido pelas normas da Consolida&ccedil;&atilde;o das Leis do Trabalho &ndash; CLT, e em suas atividades laborais est&aacute; exposto a agentes nocivos acima dos limites de toler&acirc;ncia fixados pelo Minist&eacute;rio do Trabalho e Emprego, MTE, na Norma Regulamentadora n&uacute;mero 15, NR15, ter&aacute; direito de receber o adicional de insalubridade que varia em grau m&iacute;nimo, m&eacute;dio e m&aacute;ximo com acr&eacute;scimo de 10%, 20% e 40%, respectivamente, sobre o valor do sal&aacute;rio m&iacute;nimo vigente, conforme art. 192 da CLT. A caracteriza&ccedil;&atilde;o e a classifica&ccedil;&atilde;o do car&aacute;ter insalubre s&atilde;o realizadas por per&iacute;cia de M&eacute;dico ou Engenheiro do Trabalho, de acordo com o art. 195 da CLT. Alguns exemplos de atividades exercidas por estes profissionais que podem garantir o adicional de insalubridade &eacute; a esteriliza&ccedil;&atilde;o de instrumentais odontol&oacute;gicos, contato com agulhas e materiais infecto-contagiantes e com merc&uacute;rio.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida3" aria-expanded="false" aria-controls="collapseTwo">
                                    Tenho direito ao Adicional de Periculosidade?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>O profissional que trabalha sob o regime celetista, isto &eacute;, regido pelas normas da CLT, e em suas atividades laborais est&aacute; em contato com radia&ccedil;&atilde;o ionizante, os Raios X, conforme definido pela NR16 do MTE, possui direito ao adicional de periculosidade correspondente a 30% sobre o sal&aacute;rio base, isto &eacute;, o sal&aacute;rio sem acr&eacute;scimos, gratifica&ccedil;&otilde;es e adicionais. O percentual de adicional de periculosidade &eacute; fixo e a caracteriza&ccedil;&atilde;o e a classifica&ccedil;&atilde;o da periculosidade s&atilde;o realizadas por per&iacute;cia de M&eacute;dico ou Engenheiro do Trabalho.<br />
                                    *IMPORTANTE (observa&ccedil;&otilde;es v&aacute;lidas p/ itens 1 e 2):</p>

                                <p>O profissional que atuar em situa&ccedil;&atilde;o de insalubridade cumulada com periculosidade dever&aacute; optar pelo adicional que lhe seja mais vantajoso (art. 193, &sect; 2&ordm; da CLT). Profissionais que trabalham sob o regime estatut&aacute;rio, isto &eacute;, s&atilde;o regidos pelo Estatuto dos Servidores P&uacute;blicos do ente em que trabalham (Uni&atilde;o, Estado ou Munic&iacute;pio) n&atilde;o se sujeitam ao disposto na CLT. A eles se aplicam as normas constantes do respectivo Estatuto.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida4" aria-expanded="false" aria-controls="collapseTwo">
                                    Como saber se sou empregado sujeito à CLT?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Resumidamente, se voc&ecirc; n&atilde;o &eacute; servidor p&uacute;blico estatut&aacute;rio (regido pelo Estatuto dos Servidores P&uacute;blicos do ente &ndash; Munic&iacute;pio/Estado/Uni&atilde;o &ndash; para o qual presta servi&ccedil;os), deve se atentar aos requisitos abaixo para saber se h&aacute;, ou n&atilde;o, rela&ccedil;&atilde;o de emprego (o que confere &agrave; pessoa todos os direitos listados na CLT):<br />
                                    a) Trabalho prestado por pessoa f&iacute;sica: servi&ccedil;o prestado por pessoa f&iacute;sica e n&atilde;o por pessoa jur&iacute;dica. Aten&ccedil;&atilde;o: quando o empregado &eacute; obrigado pelo empregador a constituir pessoa jur&iacute;dica, com o intuito de fraudar a legisla&ccedil;&atilde;o trabalhista, o v&iacute;nculo de emprego pode ser caracterizado mesmo assim.<br />
                                    b) Pessoalidade: o pr&oacute;prio empregado deve realizar o servi&ccedil;o, sem se fazer substituir por outro.<br />
                                    c) N&atilde;o eventualidade: a presta&ccedil;&atilde;o dos servi&ccedil;os deve ser habitual.<br />
                                    d) Onerosidade: h&aacute; recebimento de contrapresta&ccedil;&atilde;o como sal&aacute;rio/remunera&ccedil;&atilde;o. A remunera&ccedil;&atilde;o sempre possui conte&uacute;do econ&ocirc;mico.<br />
                                    e) Subordina&ccedil;&atilde;o: o empregado acata ordens e determina&ccedil;&otilde;es do empregador. Aten&ccedil;&atilde;o: Esse requisito n&atilde;o diz respeito &agrave; subordina&ccedil;&atilde;o t&eacute;cnica (qual procedimento realizar), pois o diagn&oacute;stico compete a cada Dentista.<br />
                                    Obs.: Os cinco requisitos acima listados s&atilde;o cumulativos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida5" aria-expanded="false" aria-controls="collapseTwo">
                                    Quais medicamentos eu, como Cirurgião-Dentista, posso prescrever?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>A Lei n&ordm; 5.081/66 (que regula o Exerc&iacute;cio da Odontologia) em seu artigo 6&ordm;, II, disp&otilde;e que compete ao Cirurgi&atilde;o-Dentista prescrever e aplicar especialidades farmac&ecirc;uticas de uso interno e externo, indicadas em Odontologia.</p>

                                <p>Cabe ressaltar que esse termo &eacute; colocado de forma gen&eacute;rica exatamente para n&atilde;o &ldquo;engessar&rdquo; a norma, e para n&atilde;o torn&aacute;-la obsoleta quando surgirem novos medicamentos de uso odontol&oacute;gico. Todos os medicamentos que, dentre suas finalidades terap&ecirc;uticas exista pelo menos uma finalidade odontol&oacute;gica, pode ser receitado pelo cirurgi&atilde;o dentista (visando, por &oacute;bvio, atender &agrave; finalidade odontol&oacute;gica).</p>

                                <p>Ademais, o art. 5&ordm;, inciso I, do C&oacute;digo de &Eacute;tica Odontol&oacute;gica preconiza que constituem direitos fundamentais dos profissionais inscritos, segundo suas atribui&ccedil;&otilde;es espec&iacute;ficas, diagnosticar, planejar e executar tratamentos, com liberdade de convic&ccedil;&atilde;o, nos limites de suas atribui&ccedil;&otilde;es, observados o estado atual da Ci&ecirc;ncia e sua dignidade profissional.<br />
                                    <br />
                                    Desse modo, desde que haja indica&ccedil;&atilde;o do medicamento para atender a uma finalidade odontol&oacute;gica, o Cirurgi&atilde;o Dentista pode sim receit&aacute;-lo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida6" aria-expanded="false" aria-controls="collapseTwo">
                                    Quais são os requisitos para se tornar ASB ou TSB?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>A lei 11.889/2008 regulamenta o exerc&iacute;cio das profiss&otilde;es de TSB e ASB. O art. 5&ordm; da referida lei disp&otilde;e sobre as fun&ccedil;&otilde;es do T&eacute;cnico em Sa&uacute;de Bucal (TSB). J&aacute; o art. 9&ordm; estabelece as compet&ecirc;ncias do Auxiliar de Sa&uacute;de Bucal (ASB).</p>

                                <p>O art. 16 da Consolida&ccedil;&atilde;o das Normas para Procedimentos nos Conselhos de Odontologia (Resolu&ccedil;&atilde;o do CFO n&ordm; 63 de 2005) prev&ecirc; que o curso espec&iacute;fico de TSB dever&aacute; ter dura&ccedil;&atilde;o de 1200 horas, no m&iacute;nimo, incluindo a parte especial (mat&eacute;rias profissionalizantes e est&aacute;gio), desde que tenha conclu&iacute;do o ensino m&eacute;dio.</p>

                                <p>J&aacute; o art. 19, inciso III da Res. n&ordm; 63/2005 do CFO, disp&otilde;e que para ASB &eacute; necess&aacute;rio ser portador de certificado de curso que contemple em seu hist&oacute;rico escolar carga hor&aacute;ria, ap&oacute;s o ensino fundamental, nunca inferior a 300 horas, sendo 240 horas te&oacute;rico/pr&aacute;tica e 60 horas de est&aacute;gios supervisionados, contendo as disciplinas vinculadas aos eixos tem&aacute;ticos referidos no Artigo 17 da Res. n&ordm; 63/2005 do CFO; observados os limites legais de atua&ccedil;&atilde;o do Auxiliar em Sa&uacute;de Bucal, definidos na Lei 11.889/2008.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida7" aria-expanded="false" aria-controls="collapseTwo">
                                    Quais são as atribuições dos ASBs?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Competem aos ASB&acute;s, sempre sob a supervis&atilde;o do Cirurgi&atilde;o-Dentista ou do TSB:</p>

                                <p>I &ndash; organizar e executar atividades de higiene bucal;</p>

                                <p>II &ndash; processar filme radiogr&aacute;fico;</p>

                                <p>III &ndash; preparar o paciente para o atendimento;</p>

                                <p>IV &ndash; auxiliar e instrumentar os profissionais nas interven&ccedil;&otilde;es cl&iacute;nicas, inclusive em ambientes hospitalares;</p>

                                <p>V &ndash; manipular materiais de uso odontol&oacute;gico;</p>

                                <p>VI &ndash; selecionar moldeiras;</p>

                                <p>VII &ndash; preparar modelos em gesso;</p>

                                <p>VIII &ndash; registrar dados e participar da an&aacute;lise das informa&ccedil;&otilde;es relacionadas ao controle administrativo em sa&uacute;de bucal;</p>

                                <p>IX &ndash; executar limpeza, assepsia, desinfe&ccedil;&atilde;o e esteriliza&ccedil;&atilde;o do instrumental, equipamentos odontol&oacute;gicos e do ambiente de trabalho;</p>

                                <p>X &ndash; realizar o acolhimento do paciente nos servi&ccedil;os de sa&uacute;de bucal;</p>

                                <p>XI &ndash; aplicar medidas de biosseguran&ccedil;a no armazenamento, transporte, manuseio e descarte de produtos e res&iacute;duos odontol&oacute;gicos;</p>

                                <p>XII &ndash; desenvolver a&ccedil;&otilde;es de promo&ccedil;&atilde;o da sa&uacute;de e preven&ccedil;&atilde;o de riscos ambientais e sanit&aacute;rios;</p>

                                <p>XIII &ndash; realizar em equipe levantamento de necessidades em sa&uacute;de bucal; e</p>

                                <p>XIV &ndash; adotar medidas de biosseguran&ccedil;a visando ao controle de infec&ccedil;&atilde;o.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida8" aria-expanded="false" aria-controls="collapseTwo">
                                    Quais são as atribuições dos TSBs?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Segundo o art. 5&ordm; da Lei Federal n. 11.889/2008, competem ao T&eacute;cnico em Sa&uacute;de Bucal, sempre sob a supervis&atilde;o do Cirurgi&atilde;o-Dentista, as seguintes atividades, al&eacute;m das estabelecidas para os Auxiliares em Sa&uacute;de Bucal:</p>

                                <p>I &ndash; participar do treinamento e capacita&ccedil;&atilde;o de Auxiliar em Sa&uacute;de Bucal e de agentes multiplicadores das a&ccedil;&otilde;es de promo&ccedil;&atilde;o &agrave; sa&uacute;de;</p>

                                <p>II &ndash; participar das a&ccedil;&otilde;es educativas atuando na promo&ccedil;&atilde;o da sa&uacute;de e na preven&ccedil;&atilde;o das doen&ccedil;as bucais;</p>

                                <p>III &ndash; participar na realiza&ccedil;&atilde;o de levantamentos e estudos epidemiol&oacute;gicos, exceto na categoria de examinador;</p>

                                <p>IV &ndash; ensinar t&eacute;cnicas de higiene bucal e realizar a preven&ccedil;&atilde;o das doen&ccedil;as bucais por meio da aplica&ccedil;&atilde;o t&oacute;pica do fl&uacute;or, conforme orienta&ccedil;&atilde;o do cirurgi&atilde;o-dentista;</p>

                                <p>V &ndash; fazer a remo&ccedil;&atilde;o do biofilme, de acordo com a indica&ccedil;&atilde;o t&eacute;cnica definida pelo cirurgi&atilde;o-dentista;</p>

                                <p>VI &ndash; supervisionar, sob delega&ccedil;&atilde;o do cirurgi&atilde;o-dentista, o trabalho dos auxiliares de sa&uacute;de bucal;</p>

                                <p>VII &ndash; realizar fotografias e tomadas de uso odontol&oacute;gicos exclusivamente em consult&oacute;rios ou cl&iacute;nicas odontol&oacute;gicas;</p>

                                <p>VIII &ndash; inserir e distribuir no preparo cavit&aacute;rio materiais odontol&oacute;gicos na restaura&ccedil;&atilde;o dent&aacute;ria direta, vedado o uso de materiais e instrumentos n&atilde;o indicados pelo cirurgi&atilde;o-dentista;</p>

                                <p>IX &ndash; proceder &agrave; limpeza e &agrave; anti-sepsia do campo operat&oacute;rio, antes e ap&oacute;s atos cir&uacute;rgicos, inclusive em ambientes hospitalares;</p>

                                <p>X &ndash; remover suturas;</p>

                                <p>XI &ndash; aplicar medidas de biosseguran&ccedil;a no armazenamento, manuseio e descarte de produtos e res&iacute;duos odontol&oacute;gicos;</p>

                                <p>XII &ndash; realizar isolamento do campo operat&oacute;rio;</p>

                                <p>XIII &ndash; exercer todas as compet&ecirc;ncias no &acirc;mbito hospitalar, bem como instrumentar o cirurgi&atilde;o-dentista em ambientes cl&iacute;nicos e hospitalares.</p>

                                <p>&sect; 1o Dada a sua forma&ccedil;&atilde;o, o T&eacute;cnico em Sa&uacute;de Bucal &eacute; credenciado a compor a equipe de sa&uacute;de, desenvolver atividades auxiliares em Odontologia e colaborar em pesquisas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida9" aria-expanded="false" aria-controls="collapseTwo">
                                    Quais são as atribuições dos Cirurgiões-Dentistas?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Segundo o art. 6&ordm; da Lei Federal n. 5.081 compete ao Cirurgi&atilde;o-Dentista:</p>

                                <p>&nbsp;I &ndash; praticar todos os atos pertinentes a Odontologia, decorrentes de conhecimentos adquiridos em curso regular ou em cursos de p&oacute;s-gradua&ccedil;&atilde;o;</p>

                                <p>II &ndash; prescrever e aplicar especialidades farmac&ecirc;uticas de uso interno e externo, indicadas em Odontologia;</p>

                                <p>III &ndash; atestar, no setor de sua atividade profissional, estados m&oacute;rbidos e outros, inclusive, para justifica&ccedil;&atilde;o de faltas ao emprego. (Reda&ccedil;&atilde;o dada pela Lei n&ordm; 6.215, de 1975)</p>

                                <p>IV &ndash; proceder &agrave; per&iacute;cia odontolegal em f&ocirc;ro civil, criminal, trabalhista e em sede administrativa;</p>

                                <p>V &ndash; aplicar anestesia local e truncular;</p>

                                <p>VI &ndash; empregar a analgesia e a hipnose, desde que comprovadamente habilitado, quando constitu&iacute;rem meios eficazes para o tratamento;</p>

                                <p>VII &ndash; manter, anexo ao consult&oacute;rio, laborat&oacute;rio de pr&oacute;tese, aparelhagem e instala&ccedil;&atilde;o adequadas para pesquisas e an&aacute;lises cl&iacute;nicas, relacionadas com os casos espec&iacute;ficos de sua especialidade, bem como aparelhos de Raios X, para diagn&oacute;stico, e aparelhagem de fisioterapia;</p>

                                <p>VIII &ndash; prescrever e aplicar medica&ccedil;&atilde;o de urg&ecirc;ncia no caso de acidentes graves que comprometam a vida e a sa&uacute;de do paciente;</p>

                                <p>IX &ndash; utilizar, no exerc&iacute;cio da fun&ccedil;&atilde;o de perito-odont&oacute;logo, em casos de necropsia, as vias de acesso do pesco&ccedil;o e da cabe&ccedil;a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida10" aria-expanded="false" aria-controls="collapseTwo">
                                    9- Por quanto tempo tenho que guardar o arquivo de prontuários odontológicos?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Com base na Resolu&ccedil;&atilde;o do CFO n&uacute;mero 91/2009, o tempo m&iacute;nimo para a manuten&ccedil;&atilde;o de prontu&aacute;rios odontol&oacute;gicos em suporte de papel s&atilde;o 10 (dez) anos desde a data do &uacute;ltimo registro. Essa Resolu&ccedil;&atilde;o estabelece, tamb&eacute;m, os crit&eacute;rios para a digitaliza&ccedil;&atilde;o de documentos. Aten&ccedil;&atilde;o: muito embora o CFO estipule o tempo m&iacute;nimo de 10 anos, recomenda-se guardar o prontu&aacute;rio indefinidamente. Isso pois, existem alguns riscos jur&iacute;dicos em se descartar o prontu&aacute;rio, mesmo ap&oacute;s os 10 anos. Eis alguns deles:a) O paciente pode alegar em processos judiciais v&iacute;cio oculto (defeito que s&oacute; se manifesta ap&oacute;s certo tempo, sendo de dif&iacute;cil constata&ccedil;&atilde;o pelo consumidor), ainda que fora deste prazo acima. Nesse caso, o prazo prescricional s&oacute; se inicia a partir do momento em que o v&iacute;cio p&ocirc;de ser detectado pelo consumidor &ndash; o que pode levar mais de 10 anos.<br />
                                    b) O prazo de prescri&ccedil;&atilde;o para a repara&ccedil;&atilde;o de danos n&atilde;o corre contra os absolutamente incapazes (conforme art. 3&ordm; e art. 198 do C&oacute;digo Civil).</p>

                                <p>c) Com rela&ccedil;&atilde;o a doen&ccedil;as que o Cirurgi&atilde;o Dentista poderia ter diagnosticado e sugerido tratamento a tempo, mas n&atilde;o o fez, tamb&eacute;m h&aacute; um complicador. Isso, pois o Dentista pode ser condenado muitos anos depois de findo o tratamento, com base na teoria jur&iacute;dica francesa, tamb&eacute;m adotada no Brasil, da &ldquo;Perda de uma Chance&rdquo;. Para defender-se, pode ser necess&aacute;rio apresentar documentos antigos.Por todos esses motivos &eacute; que n&atilde;o se recomenda o descarte dos prontu&aacute;rios odontol&oacute;gicos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida11" aria-expanded="false" aria-controls="collapseTwo">
                                    É possível acumulação remunerada de cargos sendo um deles de ASB?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>O cargo de Auxiliar de Sa&uacute;de Bucal &eacute; considerado &ldquo;cargo t&eacute;cnico&rdquo;, dessa forma &eacute; permitida constitucionalmente a acumula&ccedil;&atilde;o remunerada de cargo t&eacute;cnico com outro cargo (desde que haja compatibilidade de hor&aacute;rios para o exerc&iacute;cio de ambos e que n&atilde;o exceda o teto remunerat&oacute;rio do ente ao qual o servidor est&aacute; vinculado). Ex.: um cargo de ASB (cargo t&eacute;cnico) cumulado com cargo de professor de matem&aacute;tica. Importa esclarecer que, juridicamente, &ldquo;cargo t&eacute;cnico&rdquo; &eacute; diferente de &ldquo;curso t&eacute;cnico&rdquo;. &ldquo;Curso t&eacute;cnico&rdquo; n&atilde;o &eacute; pressuposto para ocupar &ldquo;cargo t&eacute;cnico&rdquo;.</p>

                                <p>&ndash; Se este for o seu caso, solicite mais informa&ccedil;&otilde;es da Comiss&atilde;o de Acolhimento, pois temos Parecer Jur&iacute;dico completo neste sentido.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida12" aria-expanded="false" aria-controls="collapseTwo">
                                    O Cirurgião-Dentista está sujeito ao Código de Defesa do Consumidor?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Sim. Tanto o profissional liberal Cirurgi&atilde;o-Dentista (pessoa f&iacute;sica) quanto a Cl&iacute;nica Odontol&oacute;gica e o</p>

                                <p>Plano de Sa&uacute;de (pessoas jur&iacute;dicas) s&atilde;o considerados fornecedores de servi&ccedil;o e est&atilde;o sujeitos &agrave;s disposi&ccedil;&otilde;es do C&oacute;digo de Defesa do Consumidor (Art. 3&ordm;, &sect; 2&ordm; da Lei 8.078/1990). O paciente, por sua vez, &eacute; o consumidor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida13" aria-expanded="false" aria-controls="collapseTwo">
                                    A Responsabilidade Civil do Dentista é diferente da Responsabilidade da Clínica?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Sim. O art. 14 do C&oacute;digo de Defesa do Consumidor, CDC, preconiza que a regra geral (&agrave; qual se sujeitam cl&iacute;nicas odontol&oacute;gicas e demais pessoas jur&iacute;dicas relacionadas &agrave; Odontologia) &eacute; que o fornecedor de servi&ccedil;os responde, independentemente da exist&ecirc;ncia de culpa, pela repara&ccedil;&atilde;o dos danos causados aos consumidores por defeitos relativos &agrave; presta&ccedil;&atilde;o dos servi&ccedil;os, bem como por informa&ccedil;&otilde;es insuficientes ou inadequadas sobre sua frui&ccedil;&atilde;o e riscos.</p>

                                <p>Nesse caso, para que a pessoa jur&iacute;dica responda, basta haver um dano e um nexo de causalidade.</p>

                                <p>J&aacute; para responsabilizar o profissional liberal deve ser comprovada, al&eacute;m do dano e do nexo de causalidade, a culpa (neglig&ecirc;ncia, imprud&ecirc;ncia ou imper&iacute;cia). Artigo 14, &sect; 4&deg; do CDC.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida14" aria-expanded="false" aria-controls="collapseTwo">
                                    Posso cobrar consulta agendada à qual paciente faltou?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Depende. Em regra, a remunera&ccedil;&atilde;o s&oacute; &eacute; devida mediante presta&ccedil;&atilde;o de servi&ccedil;os. Contudo, o Dentista ou a Cl&iacute;nica podem sim efetuar a cobran&ccedil;a de valores em virtude da aus&ecirc;ncia de seus clientes n&atilde;o avisada em tempo h&aacute;bil.</p>

                                <p>Para tanto, o profissional deve informar o consumidor antes da marca&ccedil;&atilde;o da consulta acerca dessa possibilidade. O ideal &eacute; que o contrato escrito contendo a cl&aacute;usula que permita a cobran&ccedil;a seja assinado pelo consumidor antes mesmo da primeira consulta.</p>

                                <p>A previs&atilde;o contratual de cobran&ccedil;a pelo bloqueio do hor&aacute;rio deve ser redigida com fonte n&atilde;o inferior ao corpo 12 (assim como o resto do contrato) e com destaque, por se tratar de cl&aacute;usula que limita direito do consumidor, conforme preconiza o art. 54, &sect;&sect; 3&ordm; e 4&deg; do C&oacute;digo de Defesa do Consumidor.</p>

                                <p>Deve-se atentar tamb&eacute;m para o valor da cobran&ccedil;a, que n&atilde;o pode superar o valor do procedimento, sob pena de configurar enriquecimento sem causa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida15" aria-expanded="false" aria-controls="collapseTwo">
                                    O que se entende por “dever de informação” que o Dentista tem em relação ao paciente? Onde isso está escrito?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>O C&oacute;digo de Defesa do Consumidor (Lei 8.078/1990, art. 6&ordm;, III) afirma ser direito fundamental do consumidor a obten&ccedil;&atilde;o de informa&ccedil;&atilde;o adequada e clara sobre os diferentes produtos e servi&ccedil;os e riscos que apresentem.</p>

                                <p>O C&oacute;digo de &Eacute;tica Odontol&oacute;gica (Resolu&ccedil;&atilde;o 118 de 2012 do CFO) tamb&eacute;m imp&otilde;e ao Cirurgi&atilde;o Dentista o dever de informar o seu paciente em diversas situa&ccedil;&otilde;es, dentre as quais, merecem destaque:</p>

                                <p>a) informar sobre prop&oacute;sitos, riscos, custos e alternativas do tratamento, sob pena de configurar infra&ccedil;&atilde;o &eacute;tica (Art.11, IV do C&oacute;digo de &Eacute;tica Odontol&oacute;gica);</p>

                                <p>b) informar, tamb&eacute;m sob pena de infra&ccedil;&atilde;o &eacute;tica, quais s&atilde;o os recursos dispon&iacute;veis para atendimento e responder reclama&ccedil;&otilde;es (Art. 32 do C&oacute;digo de &Eacute;tica);</p>

                                <p>c) no caso de interrup&ccedil;&atilde;o do tratamento surge o dever de informar ao colega Dentista sobre o que est&aacute; ocorrendo naquele caso (Art. 5&ordm;, V do C&oacute;digo de &Eacute;tica).</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida16" aria-expanded="false" aria-controls="collapseTwo">
                                    Como, na prática, devo informar meu paciente?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Al&eacute;m de elaborar uma ficha de evolu&ccedil;&atilde;o cl&iacute;nica de qualidade, diante do dever legal e &eacute;tico que o Cirurgi&atilde;o Dentista tem de informar o seu paciente, recomenda-se que o profissional elabore alguns documentos, dentre os quais se destacam:</p>

                                <p>a) Contrato (em suma, deve qualificar as partes, esclarecer o servi&ccedil;o a ser prestado, estipular o valor a ser pago e a forma de pagamento). A import&acirc;ncia de celebrar um contrato decorre do art. 39, IV do C&oacute;digo de Defesa do Consumidor;</p>

                                <p>b) Plano de Tratamento (deve explicar as op&ccedil;&otilde;es de tratamento existentes para o caso);</p>

                                <p>c) Termo de Consentimento Livre e Esclarecido (deve explicar em que consiste o tratamento escolhido, bem como seus riscos e os cuidados que o paciente deve ter).</p>

                                <p>Al&eacute;m desses documentos &eacute; tamb&eacute;m importante guardar c&oacute;pias de exames, receitas e encaminhamentos, dentre outros. Todos esses documentos devem ser elaborados por escrito e conter a assinatura do paciente para que o Dentista consiga comprovar, se necess&aacute;rio, que se desincumbiu do dever de informar o seu paciente.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida18" aria-expanded="false" aria-controls="collapseTwo">
                                    Posso fazer publicidade com fotos de “antes” e “depois”?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>N&atilde;o. O art. 44 do C&oacute;digo de &Eacute;tica Odontol&oacute;gica &eacute; expresso quanto &agrave; quest&atilde;o e considera infra&ccedil;&atilde;o &eacute;tica expor ao p&uacute;blico leigo artif&iacute;cios de propaganda, com o intuito de granjear clientela, especialmente com a utiliza&ccedil;&atilde;o de imagens e/ou express&otilde;es antes, durante e depois, relativas a procedimentos odontol&oacute;gicos.</p>

                                <p>Para al&eacute;m da quest&atilde;o &eacute;tica, tamb&eacute;m &eacute; importante prestar aten&ccedil;&atilde;o nas implica&ccedil;&otilde;es desse tipo de publicidade no &acirc;mbito do Direito do Consumidor. &Eacute; que o artigo 30 do C&oacute;digo de Defesa do Consumidor estipula que a oferta (como &eacute; o caso de publicidades com &ldquo;antes e depois&rdquo;) integra o contrato de consumo e obriga o fornecedor a atingir o resultado prometido. Ou seja: quando o Dentista faz uma oferta ou promete ao consumidor que o tratamento ter&aacute; determinado resultado, caso o resultado seja diverso, o Dentista deixa de ter apenas a &ldquo;obriga&ccedil;&atilde;o de meio&rdquo; (obriga&ccedil;&atilde;o de envidar todos os esfor&ccedil;os para obter &ecirc;xito) para assumir a gravosa &ldquo;obriga&ccedil;&atilde;o de resultado&rdquo; (obriga&ccedil;&atilde;o de atingir objetivamente aquela meta, sob pena de indenizar o paciente).</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida19" aria-expanded="false" aria-controls="collapseTwo">
                                    O que devo saber em relação às infrações éticas relacionadas à estipulação de honorários? Afinal, expressões como “orçamento sem compromisso” são permitidas ou não?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Com rela&ccedil;&atilde;o aos honor&aacute;rios profissionais, o C&oacute;digo de &Eacute;tica Odontol&oacute;gica (art. 20) qualifica como infra&ccedil;&atilde;o &eacute;tica: I &ndash; oferecer servi&ccedil;os gratuitos a quem possa remuner&aacute;-los adequadamente; II &ndash; oferecer seus servi&ccedil;os profissionais como pr&ecirc;mio em concurso de qualquer natureza; III &ndash; receber ou dar gratifica&ccedil;&atilde;o por encaminhamento de paciente; IV &ndash; instituir cobran&ccedil;a por meio de procedimento mercantilista; V &ndash; abusar da confian&ccedil;a do paciente submetendo-o a tratamento de custo inesperado; VI &ndash; receber ou cobrar remunera&ccedil;&atilde;o adicional de paciente atendido em institui&ccedil;&atilde;o p&uacute;blica, ou sob conv&ecirc;nio ou contrato; VII &ndash; agenciar, aliciar ou desviar, por qualquer meio, paciente de institui&ccedil;&atilde;o p&uacute;blica ou privada para cl&iacute;nica particular; VIII &ndash; permitir o oferecimento, ainda que de forma indireta, de seus servi&ccedil;os, atrav&eacute;s de outros meios como forma de brinde, premia&ccedil;&atilde;o ou descontos; IX &ndash; divulgar ou oferecer consultas e diagn&oacute;sticos gratuitos ou sem compromisso; e, X &ndash; a participa&ccedil;&atilde;o de cirurgi&atilde;o-dentista e entidades prestadoras de servi&ccedil;os odontol&oacute;gicos em cart&atilde;o de descontos, caderno de descontos, &ldquo;gift card&rdquo; ou &ldquo;vale presente&rdquo; e demais atividades mercantilistas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida20" aria-expanded="false" aria-controls="collapseTwo">
                                    Em síntese, o que é, e o que deve constar do Termo de Consentimento Livre e Esclarecido (TCLE) que devo elaborar para meus pacientes?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida20" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>O TCLE &eacute; um documento redigido em linguagem acess&iacute;vel ao leigo em que se prestam ao paciente informa&ccedil;&otilde;es sobre o procedimento odontol&oacute;gico, bem como sobre os seus riscos e os cuidados que o paciente deve ter. O documento deve ser assinado pelo paciente antes da interven&ccedil;&atilde;o do profissional.</p>

                                <p>N&atilde;o &eacute; demais lembrar que, al&eacute;m do TCLE, o Cirurgi&atilde;o Dentista deve elaborar Ficha Cl&iacute;nica completa, Contrato, Plano de Tratamento.</p>

                                <p>Esses documentos devem ser feitos por escrito e devem conter a assinatura do paciente.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida21" aria-expanded="false" aria-controls="collapseTwo">
                                    O que é, e quais são as atribuições do “Responsável Técnico” (RT) de uma Clínica Odontológica?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <h3>O RT &eacute; um Cirurgi&atilde;o Dentista devidamente inscrito no CRO que atua como guardi&atilde;o da fiel aplica&ccedil;&atilde;o do C&oacute;digo de &Eacute;tica no &acirc;mbito da pessoa jur&iacute;dica em que trabalha. Trata-se de um consultor interno sobre as normas &eacute;ticas. &Eacute; comum que o RT receba um pagamento mensal a mais por exercer essa tarefa. As principais atribui&ccedil;&otilde;es do RT na pessoa jur&iacute;dica sob sua responsabilidade s&atilde;o:<br />
                                    a) realizar a fiscaliza&ccedil;&atilde;o t&eacute;cnica e &eacute;tica da institui&ccedil;&atilde;o p&uacute;blica ou privada;<br />
                                    b) assegurar as condi&ccedil;&otilde;es adequadas para o desempenho &eacute;tico-profissional da Odontologia;<br />
                                    c) informar imediatamente e por escrito ao CRO qualquer infra&ccedil;&atilde;o &eacute;tica;<br />
                                    d) orientar a pessoa jur&iacute;dica por escrito, inclusive sobre as t&eacute;cnicas de propaganda utilizadas.<br />
                                    Obs.: O RT responde (solidariamente com os propriet&aacute;rios e demais profissionais que tenham concorrido na infra&ccedil;&atilde;o) por propagandas e publicidades em desconformidade com o C&oacute;digo de &Eacute;tica. Por isso, todo o conte&uacute;do a ser divulgado (placas, cart&otilde;es de visita, an&uacute;ncios etc) deve ser previamente aprovado pelo RT.<br />
                                    Obs.: A Vigil&acirc;ncia Sanit&aacute;ria exige mais de um RT. O CRO exige apenas um. O RT perante o CRO n&atilde;o precisa coincidir com um dos da Vigil&acirc;ncia.<br />
                                    Obs.: N&atilde;o &eacute; poss&iacute;vel ser RT de mais de uma pessoa jur&iacute;dica, salvo se uma delas for filantr&oacute;pica (e o Dentista dela nada receber) ou da administra&ccedil;&atilde;o p&uacute;blica.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida22" aria-expanded="false" aria-controls="collapseTwo">
                                    O Responsável Técnico deve interferir nos tratamentos dos colegas?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>N&atilde;o. Embora o art. 33 do C&oacute;digo de &Eacute;tica afirme que o RT deva realizar a fiscaliza&ccedil;&atilde;o t&eacute;cnica e &eacute;tica da institui&ccedil;&atilde;o pela qual &eacute; respons&aacute;vel, importa ponderar que o art. 5&ordm;, inciso I, do mesmo C&oacute;digo afirma ser direito fundamental dos Cirurgi&otilde;es Dentistas inscritos: &ldquo;diagnosticar, planejar e executar tratamentos, com liberdade de convic&ccedil;&atilde;o, observados o estado atual da Ci&ecirc;ncia e sua dignidade profissional&rdquo;. Portanto, n&atilde;o &eacute; compet&ecirc;ncia do RT interferir no direito dos seus colegas Dentistas de diagnosticarem, planejarem e tratarem seus respectivos pacientes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida23" aria-expanded="false" aria-controls="collapseTwo">
                                    Quem responde Processo Judicial Indenizatório por problemas em tratamento Odontológico?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida23" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Nesse caso podem ser compelidos a responder, cumulativamente ou n&atilde;o:<br />
                                    a) O Cirurgi&atilde;o Dentista que realizou o tratamento, que n&atilde;o necessariamente ser&aacute; o Respons&aacute;vel T&eacute;cnico;<br />
                                    b) A(s) Pessoa(s) Jur&iacute;dica(s) contratada(s) pelo paciente. Ex: Cl&iacute;nica Odontol&oacute;gica e/ou o Plano de Sa&uacute;de.<br />
                                    O paciente pode cobrar de qualquer um dos devedores ou dos dois ao mesmo tempo. Para responsabilizar uma pessoa jur&iacute;dica basta a exist&ecirc;ncia do dano e do nexo de causalidade (entre o tratamento e o dano sofrido). J&aacute; para responsabilizar o Dentista &eacute; tamb&eacute;m necess&aacute;rio comprovar que ele agiu com culpa (neglig&ecirc;ncia, imprud&ecirc;ncia ou imper&iacute;cia). Se a Cl&iacute;nica for condenada por dano cujo culpado seja um de seus Dentistas, ela pode cobrar o preju&iacute;zo dele em a&ccedil;&atilde;o de regresso.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida24" aria-expanded="false" aria-controls="collapseTwo">
                                    O que é Aliciamento de Pacientes e quais são suas implicações?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida24" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>De forma simplificada, Aliciamento de Pacientes &eacute; uma pr&aacute;tica de concorr&ecirc;ncia desleal, vedada pelo C&oacute;digo de &Eacute;tica, que consiste em chamar para si ou para outrem os pacientes alheios (sejam eles de colega, institui&ccedil;&atilde;o p&uacute;blica ou privada). &Eacute; importante esclarecer que se um paciente procura uma Cl&iacute;nica para se tratar, em regra, esse paciente &ldquo;pertence&rdquo; &agrave; Cl&iacute;nica, e n&atilde;o ao Dentista que l&aacute; o atendeu. Portanto, caso este Cirurgi&atilde;o Dentista se desvincule daquela Cl&iacute;nica, ele deve evitar chamar para si esses pacientes. Quem pratica aliciamento incorre em Infra&ccedil;&atilde;o &Eacute;tica sujeita a Processo &Eacute;tico no &acirc;mbito do CRO, bem como pode sofrer (concomitantemente) Processo Judicial pelos danos materiais e morais que provocar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida25" aria-expanded="false" aria-controls="collapseTwo">
                                    Qual a importância de um contrato bem feito com o Paciente?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida25" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>A exist&ecirc;ncia de um contrato bem estruturado entre Dentista ou Cl&iacute;nica Odontol&oacute;gica (Fornecedores de Servi&ccedil;o) e Paciente (Consumidor) representa seguran&ccedil;a jur&iacute;dica para ambas as partes. Um contrato deve conter, no m&iacute;nimo, as partes (qualificadas), o objeto (o tratamento contratado, no caso) e o pre&ccedil;o (bem como a forma de pagamento).</p>

                                <p>O contrato deve estar assinado por ambas as partes e, preferencialmente, tamb&eacute;m por duas testemunhas. Uma via fica com o Consumidor e outra com o Fornecedor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida26" aria-expanded="false" aria-controls="collapseTwo">
                                    Quais as dicas que devo saber para tentar me resguardar de alguns possíveis problemas envolvendo Contratos Odontológicos?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida26" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Existe em nosso Direito um forte sistema de prote&ccedil;&atilde;o ao Consumidor. Diante disso, vale conferir algumas Dicas Importantes:</p>

                                <p>a) As obriga&ccedil;&otilde;es de cada parte devem estar muito claramente descritas no instrumento contratual. Um or&ccedil;amento pr&eacute;vio &eacute; absolutamente imprescind&iacute;vel.</p>

                                <p>b) Caso seja necess&aacute;rio alterar o curso do tratamento acrescentando servi&ccedil;os extras, opte por redigir um termo aditivo ao contrato, assinado por Dentista e Paciente (ou seu respons&aacute;vel legal), mencionando o tratamento e o valor excedente a ele correspondente. Caso o Fornecedor preste um servi&ccedil;o que n&atilde;o tenha sido previamente acordado (preferencialmente por escrito), este se considera gratuito para o Consumidor.</p>

                                <p>c) &Eacute; considerada parte integrante do contrato toda publicidade que for veiculada em qualquer meio (r&aacute;dio, TV, telefone, email, sites, redes sociais, folhetos etc). Lembre-se que a oferta feita pode ser cobrada do Fornecedor.</p>

                                <p>d) Cuidado com as publicidades envolvendo fotos de &ldquo;Antes e Depois&rdquo;! Al&eacute;m de expressamente vedada pelo C&oacute;digo de &Eacute;tica (podendo ensejar Processo &Eacute;tico), o Consumidor pode cobrar resultado semelhante ou a indeniza&ccedil;&atilde;o correspondente (por danos materiais, morais e est&eacute;ticos).&nbsp;</p>

                                <p>e) Caso alguma cl&aacute;usula contratual seja considerada Abusiva (pelo Juiz) ela ser&aacute; considerada n&atilde;o escrita.</p>

                                <p>f) Cl&aacute;usulas que importem alguma restri&ccedil;&atilde;o ao Direito do Consumidor, desde que n&atilde;o abusivas, para terem validade devem ser redigidas em destaque.</p>

                                <p>g) O contrato, como um todo, deve ser redigido em letra n&atilde;o inferior ao corpo 12 (para que seja leg&iacute;vel).</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida27" aria-expanded="false" aria-controls="collapseTwo">
                                    O que é Abandono de Paciente e quais são suas implicações?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida27" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Abandono de Paciente, como o pr&oacute;prio termo sugere, &eacute; a neglig&ecirc;ncia do Cirurgi&atilde;o Dentista ou da Cl&iacute;nica, para com o compromisso previamente assumido de prestar um determinado servi&ccedil;o odontol&oacute;gico, conforme o acordado.&nbsp;</p>

                                <p>Aten&ccedil;&atilde;o: abandonar Paciente constitui infra&ccedil;&atilde;o &eacute;tica, salvo por motivo justific&aacute;vel, circunst&acirc;ncia em que ser&atilde;o conciliados os honor&aacute;rios e que dever&aacute; ser informada ao Paciente, ou ao seu respons&aacute;vel legal, a necessidade de continuidade do tratamento.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida28" aria-expanded="false" aria-controls="collapseTwo">
                                    O que fazer se a relação de confiança entre o Dentista e o Paciente estiver abalada?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida28" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Diante de um conflito &eacute; sempre melhor tentar uma sa&iacute;da amig&aacute;vel. Por&eacute;m, durante o curso do tratamento, podem ocorrer situa&ccedil;&otilde;es desagrad&aacute;veis que, eventualmente, tornem insustent&aacute;vel a rela&ccedil;&atilde;o entre Paciente e Dentista. O C&oacute;digo de &Eacute;tica garante ao Cirurgi&atilde;o Dentista o direito de renunciar ao atendimento do Paciente, durante o tratamento, quando da constata&ccedil;&atilde;o de fatos que, a crit&eacute;rio do profissional, prejudiquem o bom relacionamento com o Paciente ou o pleno desempenho profissional. Nestes casos tem o profissional o dever de comunicar previamente, por escrito, ao Paciente ou seu respons&aacute;vel legal, fornecendo ao Cirurgi&atilde;o Dentista que lhe suceder todas as informa&ccedil;&otilde;es necess&aacute;rias para a continuidade do tratamento.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida29" aria-expanded="false" aria-controls="collapseTwo">
                                    Afinal, o que deve constar do Termo de Interrupção de Tratamento?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida29" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Ao interromper o tratamento odontol&oacute;gico &eacute; importante elaborar previamente um termo em duas vias, datado e assinado pelo Dentista e pelo Paciente. O que deve constar do Termo de Interrup&ccedil;&atilde;o de Tratamento, para que o profissional possa se resguardar, &eacute; basicamente o seguinte:</p>

                                <p>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qualifica&ccedil;&atilde;o completa das partes;</p>

                                <p>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Informa&ccedil;&atilde;o de que o Paciente deve dar continuidade ao tratamento (ainda que com outro profissional);</p>

                                <p>c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Informa&ccedil;&atilde;o de que a c&oacute;pia da documenta&ccedil;&atilde;o odontol&oacute;gica encontra-se &agrave; disposi&ccedil;&atilde;o do Paciente ou de seu respons&aacute;vel legal. Antes de entregar a documenta&ccedil;&atilde;o deve-se elaborar recibo que especifique os itens do prontu&aacute;rio odontol&oacute;gico entregues e colher no mesmo a assinatura do Paciente ou respons&aacute;vel.</p>

                                <p>d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Informa&ccedil;&otilde;es sobre formas de restitui&ccedil;&atilde;o de eventuais honor&aacute;rios adiantados pelo Paciente que estejam em poder do Dentista ou da Cl&iacute;nica (se for o caso). Fa&ccedil;a constar no termo a forma como ocorrer&aacute; a devolu&ccedil;&atilde;o parcial ou total dos honor&aacute;rios.&nbsp;<strong>Obs.:</strong>&nbsp;n&atilde;o deixe de colher recibo dos valores devidos a t&iacute;tulo de restitui&ccedil;&atilde;o.</p>

                                <p><strong>Aten&ccedil;&atilde;o:</strong>&nbsp;Caso quem abandone o tratamento seja o pr&oacute;prio paciente, recomenda-se fazer uma notifica&ccedil;&atilde;o escrita, preferencialmente atrav&eacute;s do cart&oacute;rio de registro de t&iacute;tulos e documentos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida30" aria-expanded="false" aria-controls="collapseTwo">
                                    O que é “gestão de risco jurídico”?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida30" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>De forma sint&eacute;tica, gest&atilde;o de risco jur&iacute;dico &eacute; um termo que diz respeito &agrave; ado&ccedil;&atilde;o de um conjunto de condutas preventivas com o objetivo de minimizar os riscos de sofrer processos judiciais ou &eacute;ticos. O profissional deve ter em mente que o simples fato de ter contra si um processo, ainda que se seja ao final absolvido, j&aacute; traz dissabor e diversos gastos (diretos e indiretos). Por isso, a gest&atilde;o de risco jur&iacute;dico &eacute;, cada vez mais, uma preocupa&ccedil;&atilde;o dos Cirurgi&otilde;es Dentistas e de Cl&iacute;nicas Odontol&oacute;gicas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#duvida31" aria-expanded="false" aria-controls="collapseTwo">
                                    Como fazer gestão de risco jurídico em Odontologia?
                                </a>
                            </h4>
                        </div>
                        <div id="duvida31" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>A gest&atilde;o de riscos jur&iacute;dicos envolve uma s&eacute;rie de medidas, podendo ser necess&aacute;ria consultoria espec&iacute;fica mais aprofundada. Apresentaremos aqui algumas orienta&ccedil;&otilde;es simples e muito importantes. O gerenciamento de riscos come&ccedil;a antes mesmo de o paciente entrar no consult&oacute;rio ou cl&iacute;nica. Primeiramente, &eacute; importante analisar se os espa&ccedil;os f&iacute;sicos destinados ao atendimento est&atilde;o preparados para evitar acidentes, tais como escorreg&otilde;es em pisos molhados ou sem antiderrapantes e trombadas em portas de vidro. Tamb&eacute;m &eacute; recomend&aacute;vel que o profissional escolha um instrumental de boa qualidade e adequado ao procedimento, e que respeite as normas t&eacute;cnicas e de biosseguran&ccedil;a. &Eacute; fundamental que a equipe do consult&oacute;rio ou cl&iacute;nica seja sempre gentil com o paciente antes, durante e ap&oacute;s o tratamento. Outra quest&atilde;o muito relevante &eacute; ter consigo um prontu&aacute;rio odontol&oacute;gico completo. O paciente tem direito apenas a obter uma c&oacute;pia do prontu&aacute;rio (e n&atilde;o o original), caso o solicite. Alguns equipamentos podem ser necess&aacute;rios para que se consiga manter uma documenta&ccedil;&atilde;o odontol&oacute;gica satisfat&oacute;ria, tais como: computador, scanner (que reproduza inclusive radiografias), impressora e equipamento fotogr&aacute;fico para fotografia odontol&oacute;gica.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                @include('site.lateral')
            </div>
        </div>
    </div>
@stop

@push('js')

@endpush
