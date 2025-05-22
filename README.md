# XAMPS

---

This project provides a command-line interface to interact directly with GROQ's AI assistant. It allows users to send questions and commands via the terminal and receive real-time responses, offering a practical, fast, and efficient experience — ideal for developers and users who prefer working in the terminal.

#### EN

### Key features:


* Direct communication with GROQ's assistant via the terminal
* Real-time responses
* Lightweight integration, quick to set up and easy to use
* Perfect for automations and text-based workflows


Claro! Aqui está a versão em português seguindo a mesma formatação que usei na tradução em inglês:

---

#### PT

### Principais funcionalidades:


Este projeto oferece uma interface de linha de comando para interagir diretamente com o assistente de IA da GROQ. Ele permite que os usuários enviem perguntas e comandos via terminal e recebam respostas em tempo real, proporcionando uma experiência prática, rápida e eficiente — ideal para desenvolvedores e usuários que preferem trabalhar no terminal.

## Principais funcionalidades:

* Comunicação direta com o assistente da GROQ via terminal
* Respostas em tempo real
* Integração leve, rápida de configurar e fácil de usar
* Perfeito para automações e fluxos de trabalho baseados em texto

--- 

## 🚀 Como instalar e rodar o XAMPS (Assistente via terminal - Linux)

### 🇧🇷 Passo a passo (Português)

1. **Instale o PHP 8.2**  
No terminal, rode:

```bash
sudo apt update
sudo apt install php8.2 php8.2-cli php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip unzip
```

Confirme a instalação:  
```bash
php -v
```

2. **Clone o repositório** (se ainda não fez)

```bash
git clone <link-do-repo>
cd xamps
```

3. **Instale as dependências**

```bash
composer install
```

5. **Configure o arquivo `.env`**

```bash
cp .env.example .env
```

Abra o `.env` e cole uma chave de API válida da sua conta [groq.com](https://groq.com):

```env
groq_token=sua-chave-aqui
```

6. **Rode o assistente**

```bash
./xamps.sh
```

✅ Pronto! O XAMPS vai iniciar e já pode ser usado direto do terminal.

---

### 🇺🇸 Step by step (English)

1. **Install PHP 8.2**  
In the terminal, run:

```bash
sudo apt update
sudo apt install php8.2 php8.2-cli php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip unzip
```

Confirm the installation:  
```bash
php -v
```

2. **Clone the repository** (if you haven't yet)

```bash
git clone <repo-link>
cd xamps
```

3. **Install dependencies**

```bash
composer install
```

5. **Configure the `.env` file**

```bash
cp .env.example .env
```

Open `.env` and paste a valid API key from your [groq.com](https://groq.com) account:

```env
groq_token=your-key-here
```

6. **Run the assistant**

```bash
./xamps.sh
```

✅ Done! XAMPS will start and you can use it directly from the terminal.


