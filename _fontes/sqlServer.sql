--
-- Criar Banco de Dados
--

CREATE DATABASE [Pizzaria]
-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE [dbo].[tb_cliente](
	[cliente_id] [int] IDENTITY(1,1) NOT NULL,
	[cliente_nome] [varchar](50) NOT NULL,
	[cliente_telefone] [varchar](20) NOT NULL,
	[cliente_endereco] [varchar](100) NOT NULL,
	[cliente_frete] [decimal](5, 2) NULL,
	[cliente_latitude] [varchar](20) NULL,
	[cliente_longitude] [varchar](20) NULL,
	[cliente_distancia] [decimal](10, 3) NULL,
 CONSTRAINT [PK_tb_cliente] PRIMARY KEY CLUSTERED 
(
	[cliente_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

-- --------------------------------------------------------

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO [dbo].[tb_cliente]
           ([cliente_nome]
           ,[cliente_telefone]
           ,[cliente_endereco]
           ,[cliente_frete]
           ,[cliente_latitude]
           ,[cliente_longitude]
           ,[cliente_distancia])
     VALUES
	   ('Samara','33215544','Av. dos Cafezais, 1496 - Jardim Centro Oeste','4.00','-20.5467308','-54.6078473','10.092'),
           ('Leticia Ribeiro','33446578','R. Criciúma, 2 - Jardim Inapolis','5.00','-20.4809504','-54.7391065','16.012'),
           ('Caio Fernades','33221133','R. Johanesburgo, 231, Mata do Segredo','3.00','-20.4083662','-54.5907447','5.528')


-- --------------------------------------------------------


