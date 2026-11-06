# ForseTI — Sistema de Gerenciamento de Atendimento

O **ForseTI** é um sistema web desenvolvido para gerenciamento e organização de filas de atendimento, permitindo o controle de fichas, acompanhamento dos atendimentos e visualização das chamadas em tempo real por meio de um painel de TV.

O projeto foi desenvolvido utilizando tecnologias web, com foco na organização dos processos de atendimento, facilidade de utilização e integração com a infraestrutura de TI.

## 🎯 Objetivo do Projeto

Centralizar o gerenciamento dos atendimentos de TI, proporcionando maior organização, agilidade e transparência no fluxo de atendimento.

O sistema permite controlar as fichas, acompanhar a chamada dos usuários e disponibilizar as informações em uma tela de visualização pública.

## 🛠️ Tecnologias Utilizadas

- **PHP:** desenvolvimento da aplicação e das regras de negócio.
- **MySQL:** armazenamento e gerenciamento dos dados.
- **HTML5:** estruturação das páginas.
- **CSS3:** estilização das interfaces.
- **Bootstrap 5:** desenvolvimento de interfaces responsivas.
- **JavaScript:** funcionalidades interativas.
- **AJAX:** comunicação assíncrona e atualização das informações.
- **LDAP:** autenticação e integração com o ambiente corporativo.
- **TXT:** armazenamento auxiliar das informações de fichas e histórico de chamadas.
- **Apache:** servidor web.

## ⚙️ Funcionalidades

### 1. Gerenciamento de Fichas
- Controle das fichas de atendimento.
- Gerenciamento da ficha atualmente chamada.
- Organização do fluxo de atendimento.
- Registro e acompanhamento das chamadas.

### 2. Painel de Atendimento
- Interface para gerenciamento operacional.
- Controle das chamadas de atendimento.
- Identificação dos usuários autenticados.
- Controle de permissões de acesso.
- Restrição de funcionalidades administrativas aos usuários autorizados de TI.

### 3. Painel de TV
- Exibição da ficha atualmente chamada.
- Apresentação do histórico das últimas cinco fichas.
- Atualização automática das informações.
- Consulta periódica utilizando AJAX.
- Reprodução de aviso sonoro durante as chamadas.
- Interface desenvolvida para visualização em monitores e televisores.

### 4. Autenticação e Controle de Acesso
- Integração com LDAP.
- Gerenciamento de sessões de usuários.
- Identificação do nome completo do usuário.
- Diferenciação dos tipos de acesso.
- Restrição de operações administrativas conforme o perfil.

## 🖥️ Infraestrutura

O projeto foi desenvolvido inicialmente em ambiente Windows utilizando XAMPP, com planejamento de implantação em ambiente Linux.

**Ambiente de desenvolvimento:**
- Windows / XAMPP.
- Apache.
- PHP.
- MySQL.

**Ambiente Linux planejado:**
- Ubuntu Server 24.04.2.
- Servidor Apache.
- PHP.
- MySQL.
- Integração LDAP.

**Endereço utilizado no ambiente de desenvolvimento Linux:**

`http://192.168.0.114/forseti`

*Observação: o endereço acima corresponde a um ambiente interno de desenvolvimento e não representa um endereço público de acesso.*

## 📁 Arquivos de Controle

O sistema utiliza arquivos auxiliares para comunicação e atualização do painel de atendimento.

| Arquivo | Descrição |
|---|---|
| `ficha_atual.txt` | Armazena a informação da ficha atualmente chamada. |
| `fichas_anteriores.txt` | Mantém o histórico das últimas cinco fichas chamadas. |
| `aviso.mp3` | Arquivo de áudio utilizado para sinalização sonora das chamadas. |

## 🎨 Identidade Visual

O sistema utiliza uma identidade visual baseada em uma paleta de cores que busca transmitir organização, clareza e facilidade de navegação.

| Cor | Código |
|---|---|
| Azul escuro | `#2c3e50` |
| Laranja | `#d35400` |
| Azul | `#3498db` |
| Verde | `#27ae60` |

## 🔄 Melhorias e Evoluções

Entre as possibilidades de evolução técnica do projeto estão:

- Aprimoramento da comunicação entre o painel administrativo e a TV.
- Otimização da atualização automática das fichas.
- Aperfeiçoamento da integração entre PHP e MySQL.
- Evolução da comunicação em tempo real utilizando WebSocket.
- Melhorias de segurança e controle de permissões.
- Aprimoramento da infraestrutura Linux.

## 👨‍💻 Desenvolvedor

**Lucas Fernandes Di Leone**

Desenvolvedor e profissional de Tecnologia da Informação, com atuação em desenvolvimento web, suporte técnico, administração de sistemas e gerenciamento de infraestrutura.

Desenvolvido em Porto Alegre – RS, Brasil.

---

*ForseTI — Tecnologia e organização para um atendimento mais eficiente.*
